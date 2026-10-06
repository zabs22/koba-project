import { $, $$, pad } from './util';

/** Cake gallery lightbox built on the native <dialog> element. */
export function initCakes() {
    $$('[data-cake-dialog]').forEach((scope) => {
        const dialog = $('[data-lightbox-dialog]', scope);
        const img = $('[data-lightbox-img]', dialog);
        const caption = $('[data-lightbox-caption]', dialog);
        const count = $('[data-lightbox-count]', dialog);
        const triggers = $$('[data-lightbox]', scope);
        let index = 0;
        let opener = null;

        if (typeof dialog.showModal !== 'function') return;

        const render = (i) => {
            index = (i + triggers.length) % triggers.length;
            const trigger = triggers[index];
            img.classList.add('is-swapping');
            const next = new Image();
            next.onload = () => {
                img.src = next.src;
                img.alt = trigger.dataset.alt;
                img.classList.remove('is-swapping');
            };
            next.src = trigger.dataset.full;
            caption.textContent = trigger.dataset.alt;
            count.textContent = `${pad(index + 1)} / ${pad(triggers.length)}`;
        };

        triggers.forEach((trigger, i) => {
            trigger.addEventListener('click', () => {
                opener = trigger;
                render(i);
                dialog.showModal();
                document.body.classList.add('is-locked');
            });
        });

        $('[data-lightbox-prev]', dialog).addEventListener('click', () => render(index - 1));
        $('[data-lightbox-next]', dialog).addEventListener('click', () => render(index + 1));
        $('[data-lightbox-close]', dialog).addEventListener('click', () => dialog.close());

        dialog.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowRight') render(index + 1);
            if (event.key === 'ArrowLeft') render(index - 1);
        });

        // Click on the backdrop closes.
        dialog.addEventListener('click', (event) => {
            if (event.target === dialog) dialog.close();
        });

        dialog.addEventListener('close', () => {
            document.body.classList.remove('is-locked');
            opener?.focus();
        });
    });
}
