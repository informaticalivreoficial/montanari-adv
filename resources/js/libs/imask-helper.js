import IMask from 'imask';

/**
 * Inicializa IMask em todos os elementos com [data-imask].
 *
 * Atributos suportados:
 *   data-imask             → padrão da máscara (ex: "000.000.000-00")
 *   data-mask-type         → tipo predefinido: cpf, cnpj, phone, cep, creditcard, date
 *   data-mask-radix        → separador decimal (padrão: ,)
 *   data-mask-thousands    → separador de milhar (padrão: .)
 *   data-mask-min          → valor mínimo (para number)
 *   data-mask-max          → valor máximo (para number)
 *
 * Tipos predefinidos:
 *   cpf       → 000.000.000-00
 *   cnpj      → 00.000.000/0000-00
 *   phone     → (00) 00000-0000 ou (00) 0000-0000
 *   cep       → 00000-000
 *   creditcard → 0000 0000 0000 0000
 *   date      → 00/00/0000
 *   datetime  → 00/00/0000 00:00
 *   number    → número inteiro
 *   decimal   → número decimal
 */

const PRESET_MASKS = {
    cpf: '000.000.000-00',
    cnpj: '00.000.000/0000-00',
    phone: '(00) 00000-0000',
    cep: '00000-000',
    creditcard: '0000 0000 0000 0000',
    date: '00/00/0000',
    datetime: '00/00/0000 00:00',
};

export function initIMask(root = document) {
    const elements = root.querySelectorAll('[data-imask]');

    elements.forEach((el) => {
        // Evita reinicializar
        if (el._imaskInstance) return;

        const type = el.dataset.maskType;
        let mask;

        if (type === 'number') {
            mask = {
                mask: Number,
                min: el.dataset.maskMin !== undefined ? Number(el.dataset.maskMin) : -Infinity,
                max: el.dataset.maskMax !== undefined ? Number(el.dataset.maskMax) : Infinity,
                scale: 0,
                thousandsSeparator: '',
                radix: '',
                mapToRadix: [],
            };
        } else if (type === 'decimal') {
            mask = {
                mask: Number,
                min: el.dataset.maskMin !== undefined ? Number(el.dataset.maskMin) : -Infinity,
                max: el.dataset.maskMax !== undefined ? Number(el.dataset.maskMax) : Infinity,
                scale: 2,
                thousandsSeparator: '.',
                radix: ',',
                mapToRadix: [],
            };
        } else if (type && PRESET_MASKS[type]) {
            mask = PRESET_MASKS[type];
        } else {
            mask = el.dataset.imask;
        }

        const options = typeof mask === 'string' ? { mask } : mask;

        // Adiciona radix e thousands do dataset se fornecidos
        if (el.dataset.maskRadix) options.radix = el.dataset.maskRadix;
        if (el.dataset.maskThousands) options.thousandsSeparator = el.dataset.maskThousands;

        const instance = IMask(el, options);

        // Sincroniza com Livewire
        instance.on('accept', () => {
            el.value = instance.unmaskedValue;
            el.dispatchEvent(new Event('input', { bubbles: true }));
            el.dispatchEvent(new Event('change', { bubbles: true }));
        });

        el._imaskInstance = instance;
    });
}

/**
 * Destroi instâncias IMask de um root
 */
export function destroyIMask(root = document) {
    const elements = root.querySelectorAll('[data-imask]');
    elements.forEach((el) => {
        if (el._imaskInstance) {
            el._imaskInstance.destroy();
            delete el._imaskInstance;
        }
    });
}

export default initIMask;
