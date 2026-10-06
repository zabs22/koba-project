import { $, $$, root, reduceMotion, finePointer, onFrame, storage } from './util';

/* ---------- Loader: shown on the first visit of a session only ----------- */

export function initLoader(onReady) {
    const loader = $('.loader');
    let finished = false;

    const finish = () => {
        if (finished) return;
        finished = true;
        loader?.classList.add('is-done');
        root.classList.add('is-ready');
        onReady();
    };

    storage.set('koba:visited', '1');

    if (!loader || root.classList.contains('no-loader')) {
        finish();
        return;
    }

    // Never artificially delayed: leave as soon as the page has loaded,
    // with a short floor so the mark does not merely flash.
    const started = performance.now();
    const leave = () => setTimeout(finish, Math.max(0, 450 - (performance.now() - started)));

    if (document.readyState === 'complete') leave();
    else window.addEventListener('load', leave, { once: true });

    setTimeout(finish, 2600);
}

/* ---------- Page curtain between internal pages ------------------------- */

export function initCurtain() {
    const curtain = $('.curtain');
    if (!curtain) return;

    if (root.classList.contains('from-transition')) {
        requestAnimationFrame(() => {
            curtain.classList.add('is-leaving');
            root.classList.remove('from-transition');
            curtain.addEventListener('transitionend', () => curtain.classList.remove('is-leaving'), { once: true });
        });
    }

    window.addEventListener('pageshow', (event) => {
        if (event.persisted) curtain.classList.remove('is-covering', 'is-leaving');
    });

    if (reduceMotion) return;

    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[href]');
        if (!link || event.defaultPrevented || event.button !== 0) return;
        if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) return;
        if (link.target === '_blank' || link.hasAttribute('download')) return;

        const url = new URL(link.href, location.href);
        if (url.origin !== location.origin) return;
        if (url.pathname === location.pathname && url.search === location.search) return;

        event.preventDefault();
        storage.set('koba:transition', '1');
        curtain.classList.add('is-covering');
        setTimeout(() => { location.href = url.href; }, 620);
    });
}

/* ---------- Header: solid on scroll, tucks away while reading ----------- */

export function initHeader() {
    const header = $('[data-header]');
    if (!header) return;
    let lastY = window.scrollY;

    onFrame(() => {
        const y = window.scrollY;
        header.classList.toggle('is-scrolled', y > 24);
        const goingDown = y > lastY + 4;
        const goingUp = y < lastY - 4;
        if (!document.body.classList.contains('is-locked')) {
            if (goingDown && y > 640) header.classList.add('is-hidden');
            if (goingUp || y < 640) header.classList.remove('is-hidden');
        }
        root.classList.toggle('header-hidden', header.classList.contains('is-hidden'));
        if (goingDown || goingUp) lastY = y;
    });

    header.addEventListener('focusin', () => header.classList.remove('is-hidden'));
}

/* ---------- Overlay menu (all widths below desktop) --------------------- */

export function initOverlayMenu() {
    const toggle = $('[data-menu-toggle]');
    const menu = $('[data-overlay-menu]');
    const header = $('[data-header]');
    if (!toggle || !menu) return;

    const label = $('[data-menu-label]', toggle);
    const srLabel = $('[data-menu-sr]', toggle);
    const links = $$('a', menu);
    const openText = label.textContent;

    const setOpen = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        menu.classList.toggle('is-open', open);
        header.classList.toggle('menu-open', open);
        document.body.classList.toggle('is-locked', open);
        label.textContent = open ? toggle.dataset.closeText || 'Close' : openText;
        srLabel.textContent = open ? toggle.dataset.labelClose : toggle.dataset.labelOpen;
        if (open) setTimeout(() => links[0]?.focus({ preventScroll: true }), 350);
    };

    toggle.addEventListener('click', () => setOpen(toggle.getAttribute('aria-expanded') !== 'true'));

    document.addEventListener('keydown', (event) => {
        if (!menu.classList.contains('is-open')) return;
        if (event.key === 'Escape') {
            setOpen(false);
            toggle.focus();
        }
        if (event.key === 'Tab') {
            const focusable = [toggle, ...links];
            const index = focusable.indexOf(document.activeElement);
            const next = event.shiftKey ? index - 1 : index + 1;
            if (next < 0 || next >= focusable.length) {
                event.preventDefault();
                focusable[event.shiftKey ? focusable.length - 1 : 0].focus();
            }
        }
    });

    window.matchMedia('(min-width: 1101px)').addEventListener('change', (event) => {
        if (event.matches) setOpen(false);
    });
}

/* ---------- Cursor label: "View", "Explore", "Discover" ------------------ */

export function initCursor() {
    const cursor = $('.cursor');
    if (!cursor || !finePointer || reduceMotion) return;
    const label = $('.cursor__label', cursor);

    let x = -200, y = -200, cx = -200, cy = -200, running = false;

    const tick = () => {
        cx += (x - cx) * 0.18;
        cy += (y - cy) * 0.18;
        cursor.style.setProperty('--x', `${cx}px`);
        cursor.style.setProperty('--y', `${cy}px`);
        if (Math.abs(x - cx) > 0.2 || Math.abs(y - cy) > 0.2) requestAnimationFrame(tick);
        else running = false;
    };

    document.addEventListener('pointermove', (event) => {
        x = event.clientX;
        y = event.clientY;
        if (!running) {
            running = true;
            requestAnimationFrame(tick);
        }
    }, { passive: true });

    document.addEventListener('pointerover', (event) => {
        const target = event.target.closest('[data-cursor]');
        if (target) {
            label.textContent = target.dataset.cursor;
            cursor.classList.add('is-active');
        }
    });

    document.addEventListener('pointerout', (event) => {
        const from = event.target.closest('[data-cursor]');
        if (from && !from.contains(event.relatedTarget)) cursor.classList.remove('is-active');
    });
}
