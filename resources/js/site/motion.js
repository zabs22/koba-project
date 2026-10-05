import { $, $$, clamp, pad, reduceMotion, finePointer, onFrame } from './util';

/* ---------- Scroll reveals ---------------------------------------------- */

export function initReveals() {
    const items = $$('[data-reveal]');
    if (reduceMotion || !('IntersectionObserver' in window)) {
        items.forEach((el) => el.classList.add('is-in'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-in');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });

    items.forEach((el) => observer.observe(el));
}

/* ---------- Gentle parallax on decorative layers and images -------------- */

export function initParallax() {
    if (reduceMotion) return;
    const items = $$('[data-parallax]').map((el) => ({ el, speed: parseFloat(el.dataset.parallax) || 0 }));
    if (!items.length) return;

    onFrame((vh) => {
        if (window.innerWidth < 700) return;
        items.forEach(({ el, speed }) => {
            const rect = el.getBoundingClientRect();
            if (rect.bottom < -200 || rect.top > vh + 200) return;
            const offset = (rect.top + rect.height / 2 - vh / 2) * speed;
            el.style.translate = `0 ${offset.toFixed(1)}px`;
        });
    });
}

/* ---------- Hero: slow mouse parallax ----------------------------------- */

export function initHeroParallax() {
    const hero = $('[data-hero]');
    if (!hero || !finePointer || reduceMotion) return;

    hero.addEventListener('pointermove', (event) => {
        const rect = hero.getBoundingClientRect();
        const mx = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
        const my = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        hero.style.setProperty('--mx', mx.toFixed(3));
        hero.style.setProperty('--my', my.toFixed(3));
        hero.classList.add('is-tracking');
    });

    hero.addEventListener('pointerleave', () => {
        hero.style.setProperty('--mx', 0);
        hero.style.setProperty('--my', 0);
    });
}

/* ---------- Experience: image opens up as you scroll -------------------- */

export function initScrub() {
    const sections = $$('[data-scrub]');
    if (!sections.length || reduceMotion) return;

    onFrame((vh) => {
        sections.forEach((section) => {
            const rect = section.getBoundingClientRect();
            if (rect.bottom < 0 || rect.top > vh) return;
            const travel = vh + (rect.height - vh) * 0.5;
            section.style.setProperty('--p', clamp((vh - rect.top) / travel).toFixed(4));
        });
    });
}

/* ---------- Manifesto: fragments revealed one by one --------------------- */

export function initManifesto() {
    const section = $('[data-manifesto]');
    if (!section || reduceMotion) return;

    const steps = $$('[data-step]', section);
    const count = $('[data-manifesto-count]', section);
    const fragments = steps.length - 2;
    let current = -1;

    section.classList.add('is-cinematic');

    onFrame((vh) => {
        const rect = section.getBoundingClientRect();
        if (rect.bottom < 0 || rect.top > vh) return;
        const progress = clamp(-rect.top / (rect.height - vh));
        section.style.setProperty('--mp', progress.toFixed(4));

        const index = Math.min(steps.length - 1, Math.floor(progress * steps.length));
        if (index === current) return;
        current = index;
        steps.forEach((step, i) => {
            step.classList.toggle('is-current', i === index);
            step.classList.toggle('is-past', i < index);
        });
        count.textContent = pad(clamp(index, 0, fragments));
    });
}
