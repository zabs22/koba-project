import { $, $$ } from './util';

const normalize = (value) => value.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '').trim();

/** Menu page: live search across every dish, and a scroll-aware category bar. */
export function initMenu() {
    const input = $('[data-menu-input]');
    const sections = $$('[data-menu-section]');
    const empty = $('[data-menu-empty]');
    const status = $('[data-menu-status]');
    const links = $$('[data-spy]');
    const template = $('[data-menu-search]').dataset.msgResults || ':count';

    input.addEventListener('input', () => {
        const query = normalize(input.value);
        let total = 0;

        sections.forEach((section) => {
            let visible = 0;
            $$('[data-menu-item]', section).forEach((item) => {
                const match = !query || item.dataset.name.includes(query);
                item.hidden = !match;
                if (match) visible++;
            });
            section.hidden = Boolean(query) && visible === 0;
            total += visible;
        });

        empty.hidden = !(query && total === 0);
        status.textContent = query ? template.replace(':count', total) : '';
        links.forEach((link) => {
            link.parentElement.hidden = Boolean(query) && document.getElementById(link.dataset.spy)?.hidden;
        });
    });

    if (!('IntersectionObserver' in window)) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            links.forEach((link) => {
                const active = link.dataset.spy === entry.target.id;
                link.classList.toggle('is-active', active);
                if (active) {
                    link.setAttribute('aria-current', 'true');
                    const nav = link.closest('nav');
                    nav.scrollTo({ left: link.offsetLeft - nav.clientWidth / 2 + link.offsetWidth / 2, behavior: 'smooth' });
                } else {
                    link.removeAttribute('aria-current');
                }
            });
        });
    }, { rootMargin: '-40% 0px -55% 0px' });

    sections.forEach((section) => observer.observe(section));
}
