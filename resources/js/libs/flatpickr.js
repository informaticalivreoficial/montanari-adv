import flatpickr from 'flatpickr';
import { Portuguese } from 'flatpickr/dist/l10n/pt.js';
import 'flatpickr/dist/flatpickr.min.css';

/**
 * Inicializa flatpickr em todos os elementos com [data-flatpickr].
 *
 * Atributos suportados:
 *   data-flatpickr            → ativa o datepicker
 *   data-enable-time          → mostra hora
 *   data-date-format          → formato (padrão: d/m/Y)
 *   data-min-date             → data mínima
 *   data-max-date             → data máxima
 *   data-default-date         → valor inicial
 *   data-mode                 → single | multiple | range
 *   data-alt-input            →true usa input alternativo
 *   data-time-24hr            → 24h
 *
 * Dispara eventos Livewire:
 *   @change → wire:model funciona normalmente via input
 */
export function initFlatpickr(root = document) {
    const elements = root.querySelectorAll('[data-flatpickr]');

    elements.forEach((el) => {
        // Evita reinicializar
        if (el._flatpickr) return;

        const config = {
            locale: Portuguese,
            dateFormat: el.dataset.dateFormat || 'd/m/Y',
            altInput: el.dataset.altInput === 'true',
            time_24hr: el.dataset.time24hr === 'true',
            defaultDate: el.dataset.defaultDate || undefined,
            mode: el.dataset.mode || 'single',
            minDate: el.dataset.minDate || undefined,
            maxDate: el.dataset.maxDate || undefined,
            enableTime: el.dataset.enableTime === 'true',
            noCalendar: el.dataset.noCalendar === 'true',
            onChange(selectedDates, dateStr, instance) {
                // Atualiza o valor do input para Livewire wire:model
                el.value = dateStr;
                el.dispatchEvent(new Event('input', { bubbles: true }));
                el.dispatchEvent(new Event('change', { bubbles: true }));
            },
        };

        // Limpa config undefined
        Object.keys(config).forEach((key) => {
            if (config[key] === undefined) delete config[key];
        });

        flatpickr(el, config);
    });
}

export default initFlatpickr;
