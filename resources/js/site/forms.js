import { $, $$ } from './util';

/** Human label for a control: its <label for>, or the legend of its fieldset. */
function labelFor(form, control) {
    const label = control.id && $(`label[for="${control.id}"]`, form);
    if (label) return label.textContent.trim();
    const legend = control.closest('fieldset')?.querySelector('.field__label');
    return legend ? legend.textContent.trim() : control.name;
}

export function setFieldError(form, name, message = '') {
    const holder = $(`[data-error-for="${name}"]`, form);
    if (holder) holder.textContent = message;
    $$(`[name="${name}"]`, form).forEach((control) => {
        if (message) control.setAttribute('aria-invalid', 'true');
        else control.removeAttribute('aria-invalid');
    });
}

/**
 * Validates every named control inside `scope`, writes messages next to the
 * fields and returns the names that failed (in document order).
 */
export function validate(form, scope = form) {
    const controls = $$('input[name], select[name], textarea[name]', scope).filter((c) => c.type !== 'hidden');
    const names = [...new Set(controls.map((c) => c.name))];
    const required = form.dataset.msgRequired || '';
    const invalid = [];

    names.forEach((name) => {
        const group = controls.filter((c) => c.name === name);
        const control = group[0];
        const value = control.type === 'radio' ? '' : control.value.trim();
        let message = '';

        if (control.type === 'radio') {
            if (control.required && !group.some((r) => r.checked)) message = required.replace(':field', labelFor(form, control));
        } else if (control.required && !value) {
            message = required.replace(':field', labelFor(form, control));
        } else if (value && control.dataset.pattern && !new RegExp(control.dataset.pattern).test(value)) {
            message = form.dataset.msgPhone || control.validationMessage;
        } else if (value && control.type === 'date' && control.min && value < control.min) {
            message = form.dataset.msgDate || control.validationMessage;
        } else if (value && !control.checkValidity()) {
            message = control.validationMessage;
        }

        setFieldError(form, name, message);
        if (message) invalid.push(name);
    });

    return invalid;
}

/** Clears a field's message as soon as the guest corrects it. */
export function clearOnInput(form) {
    form.addEventListener('input', (event) => {
        if (event.target.name && event.target.getAttribute('aria-invalid')) setFieldError(form, event.target.name, '');
    });
    form.addEventListener('change', (event) => {
        if (event.target.name) setFieldError(form, event.target.name, '');
    });
}

/** Posts the form as JSON-accepting request; returns { ok, status, data }. */
export async function send(form) {
    const response = await fetch(form.action, {
        method: 'POST',
        headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: new FormData(form),
    });
    const data = await response.json().catch(() => ({}));
    return { ok: response.ok, status: response.status, data };
}

/** Shows server-side (422) messages next to their fields; returns the first failing name. */
export function applyServerErrors(form, errors = {}) {
    const names = Object.keys(errors);
    names.forEach((name) => setFieldError(form, name, errors[name][0]));
    return names[0];
}

export function setBusy(button, busy, label) {
    if (!button) return;
    if (busy) {
        button.dataset.label = button.innerHTML;
        button.textContent = label;
        button.disabled = true;
    } else if (button.dataset.label) {
        button.innerHTML = button.dataset.label;
        button.disabled = false;
    }
}
