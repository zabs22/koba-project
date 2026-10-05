import { $, $$, clamp, pad, finePointer } from './util';

/* ---------- Accessible tabs (horizontal or vertical) --------------------- */

export function initTabs() {
    $$('[data-tabs]').forEach((scope) => {
        const list = $('[role="tablist"]', scope);
        const tabs = $$('[role="tab"]', list);
        const indicator = $('.tabs__indicator', list);
        const vertical = list.getAttribute('aria-orientation') === 'vertical';

        const placeIndicator = (tab) => {
            if (!indicator) return;
            indicator.style.setProperty('--x', `${tab.offsetLeft}px`);
            indicator.style.setProperty('--w', `${tab.offsetWidth}px`);
        };

        const select = (tab, focus = false) => {
            tabs.forEach((other) => {
                const selected = other === tab;
                other.setAttribute('aria-selected', String(selected));
                other.tabIndex = selected ? 0 : -1;
                const panel = document.getElementById(other.getAttribute('aria-controls'));
                if (!panel) return;
                panel.hidden = !selected;
                panel.classList.remove('is-active');
                if (selected) {
                    void panel.offsetWidth; // restart the entrance animation
                    panel.classList.add('is-active');
                }
            });
            placeIndicator(tab);
            if (list.scrollWidth > list.clientWidth) {
                list.scrollTo({ left: tab.offsetLeft - list.clientWidth / 2 + tab.offsetWidth / 2, behavior: 'smooth' });
            }
            if (focus) tab.focus();
        };

        tabs.forEach((tab, i) => {
            tab.addEventListener('click', () => select(tab));
            tab.addEventListener('keydown', (event) => {
                const prev = vertical ? 'ArrowUp' : 'ArrowLeft';
                const next = vertical ? 'ArrowDown' : 'ArrowRight';
                let target = null;
                if (event.key === next) target = tabs[(i + 1) % tabs.length];
                if (event.key === prev) target = tabs[(i - 1 + tabs.length) % tabs.length];
                if (event.key === 'Home') target = tabs[0];
                if (event.key === 'End') target = tabs[tabs.length - 1];
                if (target) {
                    event.preventDefault();
                    select(target, true);
                }
            });
        });

        const initial = tabs.find((tab) => tab.getAttribute('aria-selected') === 'true') || tabs[0];
        placeIndicator(initial);
        window.addEventListener('resize', () => placeIndicator(tabs.find((t) => t.tabIndex === 0)));
        document.fonts?.ready.then(() => placeIndicator(tabs.find((t) => t.tabIndex === 0)));
    });
}

/* ---------- Generic "hover/focus to feature" lists ----------------------- */

function initFeatureList(scope, itemSelector, onActivate) {
    const items = $$(itemSelector, scope);
    const activate = (item) => {
        if (item.classList.contains('is-active')) return;
        items.forEach((other) => other.classList.toggle('is-active', other === item));
        onActivate(items.indexOf(item));
    };
    items.forEach((item) => {
        item.addEventListener('pointerenter', (event) => { if (event.pointerType === 'mouse') activate(item); });
        item.addEventListener('focusin', () => activate(item));
        item.addEventListener('click', () => activate(item));
    });
}

export function initPrinciples() {
    $$('[data-principles]').forEach((scope) => {
        const images = $$('[data-principle-image]', scope);
        const count = $('[data-principle-count]', scope);
        initFeatureList(scope, '[data-principle]', (index) => {
            images.forEach((img, i) => img.classList.toggle('is-active', i === index));
            if (count) count.textContent = pad(index + 1);
        });
    });
}

export function initLocations() {
    $$('[data-locations]').forEach((scope) => {
        const images = $$('[data-branch-image]', scope);
        const moods = $$('[data-branch-mood]', scope);
        initFeatureList(scope, '[data-branch]', (index) => {
            images.forEach((img, i) => img.classList.toggle('is-active', i === index));
            moods.forEach((mood, i) => mood.classList.toggle('is-active', i === index));
        });

        // Maps load only on request — no third-party requests until asked.
        $$('[data-map]', scope).forEach((holder) => {
            $('[data-map-load]', holder)?.addEventListener('click', () => {
                const frame = document.createElement('iframe');
                frame.src = holder.dataset.src;
                frame.title = holder.dataset.title;
                frame.loading = 'lazy';
                frame.referrerPolicy = 'no-referrer-when-downgrade';
                holder.replaceChildren(frame);
            });
        });
    });
}

/** Cake index on the Cakes page: hovering a name shows its photograph. */
export function initFeatures() {
    $$('[data-feature]').forEach((scope) => {
        const images = $$('[data-feature-image]', scope);
        initFeatureList(scope, '[data-feature-item]', (index) => {
            images.forEach((img, i) => img.classList.toggle('is-active', i === index));
        });
    });
}

/* ---------- Draggable carousel with native scroll-snap ------------------- */

export function initCarousels() {
    $$('[data-carousel]').forEach((carousel) => {
        const track = $('[data-carousel-track]', carousel);
        const prev = $('[data-carousel-prev]', carousel);
        const next = $('[data-carousel-next]', carousel);
        const bar = $('[data-carousel-progress]', carousel);
        const slides = $$('.carousel__slide', track);

        const update = () => {
            const max = track.scrollWidth - track.clientWidth;
            const visible = track.clientWidth / track.scrollWidth;
            bar?.style.setProperty('--p', clamp(visible + (1 - visible) * (max ? track.scrollLeft / max : 1)).toFixed(3));
            if (prev) prev.disabled = track.scrollLeft <= 4;
            if (next) next.disabled = track.scrollLeft >= max - 4;
        };

        const step = (direction) => {
            const width = slides[0].getBoundingClientRect().width + parseFloat(getComputedStyle(track).columnGap || 0);
            track.scrollBy({ left: direction * width, behavior: 'smooth' });
        };

        prev?.addEventListener('click', () => step(-1));
        next?.addEventListener('click', () => step(1));
        track.addEventListener('scroll', update, { passive: true });
        window.addEventListener('resize', update);
        track.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowRight') { event.preventDefault(); step(1); }
            if (event.key === 'ArrowLeft') { event.preventDefault(); step(-1); }
        });
        update();

        if (!finePointer) return;

        // Mouse drag; touch keeps native momentum scrolling.
        let startX = 0, startLeft = 0, dragging = false, moved = false;
        track.addEventListener('pointerdown', (event) => {
            if (event.pointerType !== 'mouse' || event.button !== 0) return;
            dragging = true;
            moved = false;
            startX = event.clientX;
            startLeft = track.scrollLeft;
        });
        window.addEventListener('pointermove', (event) => {
            if (!dragging) return;
            const dx = event.clientX - startX;
            if (!moved && Math.abs(dx) > 6) {
                moved = true;
                track.classList.add('is-dragging');
            }
            if (moved) track.scrollLeft = startLeft - dx;
        });
        window.addEventListener('pointerup', () => {
            if (!dragging) return;
            dragging = false;
            if (moved) {
                const left = track.scrollLeft;
                track.classList.remove('is-dragging');
                track.scrollLeft = left;
                // Settle on the nearest slide.
                const width = slides[0].getBoundingClientRect().width;
                track.scrollTo({ left: Math.round(left / width) * width, behavior: 'smooth' });
            }
        });
        track.addEventListener('click', (event) => {
            if (moved) {
                event.preventDefault();
                moved = false;
            }
        }, true);
    });
}

/* ---------- Pause marquees while off-screen ------------------------------ */

export function initMarquees() {
    const marquees = $$('[data-marquee]');
    if (!marquees.length || !('IntersectionObserver' in window)) return;
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            $('.marquee__track', entry.target).style.animationPlayState = entry.isIntersecting ? '' : 'paused';
        });
    });
    marquees.forEach((m) => observer.observe(m));
}
