import { $, $$, reduceMotion } from './util';
import { validate, clearOnInput, send, applyServerErrors, setBusy } from './forms';

/** Multi-step cake order: details → cake → date → request → review. */
export function initOrderForm() {
    const form = $('[data-order-form]');
    const steps = $$('[data-ostep]', form);
    const progress = $$('[data-progress]');
    const prev = $('[data-prev]', form);
    const next = $('[data-next]', form);
    const submit = $('[data-submit]', form);
    const stepOf = $('[data-step-of]', form);
    const formError = $('[data-form-error]', form);
    const success = $('[data-order-success]');
    const previews = $$('[data-preview]');
    const last = steps.length - 1;
    let current = 0;

    form.classList.add('is-enhanced');
    clearOnInput(form);

    const stepOfField = (name) => {
        const control = $(`[name="${name}"]`, form);
        return control ? steps.indexOf(control.closest('[data-ostep]')) : 0;
    };

    const scrollToForm = () => {
        const top = form.getBoundingClientRect().top + window.scrollY - 140;
        if (Math.abs(window.scrollY - top) > 80) window.scrollTo({ top, behavior: reduceMotion ? 'auto' : 'smooth' });
    };

    const show = (index, focus = true) => {
        current = index;
        steps.forEach((step, i) => {
            step.hidden = i !== index;
            step.classList.toggle('is-current', i === index);
        });
        progress.forEach((item, i) => {
            item.classList.toggle('is-current', i === index);
            item.classList.toggle('is-done', i < index);
        });
        prev.hidden = index === 0;
        next.hidden = index === last;
        submit.hidden = index !== last;
        stepOf.textContent = form.dataset.msgStep.replace(':current', index + 1).replace(':total', steps.length);
        if (index === last) fillReview();
        if (focus) {
            const heading = $('.ostep__legend', steps[index]);
            heading.tabIndex = -1;
            heading.focus({ preventScroll: true });
            scrollToForm();
        }
    };

    const fillReview = () => {
        const text = (name) => {
            const controls = $$(`[name="${name}"]`, form);
            const control = controls[0];
            if (control.type === 'radio') {
                const checked = controls.find((c) => c.checked);
                return checked ? checked.closest('label').textContent.trim() : '';
            }
            if (control.tagName === 'SELECT') return control.selectedOptions[0]?.value ? control.selectedOptions[0].textContent : '';
            if (control.type === 'date' && control.value) {
                return new Intl.DateTimeFormat(document.documentElement.lang || 'en', { dateStyle: 'full' })
                    .format(new Date(`${control.value}T12:00:00`));
            }
            return control.value.trim();
        };
        $$('[data-review-for]', form).forEach((dd) => { dd.textContent = text(dd.dataset.reviewFor) || '—'; });
    };

    next.addEventListener('click', () => {
        const invalid = validate(form, steps[current]);
        if (invalid.length) {
            $(`[name="${invalid[0]}"]`, form)?.focus();
            return;
        }
        show(current + 1);
    });

    prev.addEventListener('click', () => show(current - 1));

    $$('[data-goto]', form).forEach((button) => {
        button.addEventListener('click', () => show(Number(button.dataset.goto)));
    });

    // Enter moves forward instead of submitting early.
    form.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' && event.target.tagName === 'INPUT' && current < last) {
            event.preventDefault();
            next.click();
        }
    });

    // The aside preview follows the chosen cake.
    const syncPreview = () => {
        const chosen = $('input[name="cake"]:checked', form)?.value || 'none';
        previews.forEach((el) => el.classList.toggle('is-active', el.dataset.preview === chosen));
    };
    form.addEventListener('change', (event) => { if (event.target.name === 'cake') syncPreview(); });
    syncPreview();

    // Character count for the request.
    const notes = $('[name="notes"]', form);
    const count = $('[data-count-for="notes"]', form);
    const updateCount = () => { count.textContent = `${notes.value.length} / ${notes.maxLength}`; };
    notes.addEventListener('input', updateCount);
    updateCount();

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        formError.hidden = true;

        for (let i = 0; i < last; i++) {
            const invalid = validate(form, steps[i]);
            if (invalid.length) {
                show(i);
                $(`[name="${invalid[0]}"]`, form)?.focus();
                return;
            }
        }

        setBusy(submit, true, form.dataset.msgSending);
        try {
            const { ok, status, data } = await send(form);
            if (ok) {
                form.hidden = true;
                progress.forEach((item) => { item.classList.remove('is-current'); item.classList.add('is-done'); });
                success.hidden = false;
                success.focus();
                scrollToForm();
                return;
            }
            if (status === 422) {
                const first = applyServerErrors(form, data.errors);
                show(stepOfField(first));
                return;
            }
            throw new Error(String(status));
        } catch {
            formError.textContent = form.dataset.msgError;
            formError.hidden = false;
        } finally {
            setBusy(submit, false);
        }
    });

    // Server-side errors (no-JS round trip) open on the first failing step.
    const firstError = $$('[data-error-for]', form).find((el) => el.textContent.trim());
    show(firstError ? stepOfField(firstError.dataset.errorFor) : 0, false);
}
