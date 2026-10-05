import { $, $$ } from './util';
import { validate, clearOnInput, send, applyServerErrors, setBusy } from './forms';

export function initEnquiryForms() {
    $$('[data-enquiry-form]').forEach((form) => {
        const submit = $('[data-submit]', form);
        const formError = $('[data-form-error]', form);
        const success = form.parentElement.querySelector('[data-enquiry-success]');

        clearOnInput(form);

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            formError.hidden = true;

            const invalid = validate(form);
            if (invalid.length) {
                $(`[name="${invalid[0]}"]`, form)?.focus();
                return;
            }

            setBusy(submit, true, form.dataset.msgSending);
            try {
                const { ok, status, data } = await send(form);
                if (ok) {
                    form.hidden = true;
                    success.hidden = false;
                    success.focus();
                    return;
                }
                if (status === 422) {
                    $(`[name="${applyServerErrors(form, data.errors)}"]`, form)?.focus();
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
    });
}
