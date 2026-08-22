/**
 * ═══════════════════════════════════════════════════════════
 * Quill Editor Helper - Montanari Adv
 * ═══════════════════════════════════════════════════════════
 *
 * Inicializa editores Quill e sincroniza com Livewire.
 *
 * Disponível globalmente:
 *   window.initQuill(container, wire, property, options)
 *   window.destroyQuill(container)
 */

import Quill from 'quill';
import 'quill/dist/quill.snow.css';

const editors = new Map();

/**
 * Toolbars predefinidos
 */
const TOOLBARS = {
    default: [
        [{ header: [1, 2, 3, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ color: [] }, { background: [] }],
        [{ list: 'ordered' }, { list: 'bullet' }],
        [{ align: [] }],
        ['link', 'blockquote'],
        ['clean'],
    ],
    full: [
        [{ font: [] }, { size: ['small', false, 'large', 'huge'] }],
        [{ header: [1, 2, 3, 4, 5, 6, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        [{ color: [] }, { background: [] }],
        [{ script: 'sub' }, { script: 'super' }],
        [{ list: 'ordered' }, { list: 'bullet' }, { indent: '-1' }, { indent: '+1' }],
        [{ direction: 'rtl' }],
        [{ align: [] }],
        ['link', 'blockquote', 'code-block'],
        ['clean'],
    ],
    minimal: [
        ['bold', 'italic', 'underline'],
        [{ list: 'ordered' }, { list: 'bullet' }],
        ['link'],
        ['clean'],
    ],
    none: false,
};

/**
 * Inicializa um editor Quill em um container.
 */
window.initQuill = function (container, wire, property, options = {}) {
    if (!container) return null;

    // Evita dupla inicialização
    if (editors.has(container)) {
        return editors.get(container);
    }

    const {
        toolbar = 'default',
        placeholder = 'Digite o conteúdo aqui...',
        readOnly = false,
    } = options;

    const toolbarConfig = TOOLBARS[toolbar] !== undefined ? TOOLBARS[toolbar] : TOOLBARS.default;

    const quillOptions = {
        theme: 'snow',
        placeholder,
        readOnly,
        modules: {},
    };

    if (toolbarConfig !== false) {
        quillOptions.modules.toolbar = toolbarConfig;
    }

    if (toolbarConfig === false) {
        const wrapper = container.closest('.quill-editor-wrapper');
        if (wrapper) wrapper.classList.add('toolbar-none');
    }

    const quill = new Quill(container, quillOptions);

    // Define conteúdo inicial
    const initialContent = wire[property] || '';
    if (initialContent) {
        quill.root.innerHTML = initialContent;
    }

    // Sincroniza com Livewire (debounce 300ms)
    let timeout;
    quill.on('text-change', () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            try {
                wire[property] = quill.root.innerHTML;
            } catch (e) {}
        }, 300);
    });

    editors.set(container, quill);

    // Fix: remove aria-hidden from picker dropdowns to prevent a11y errors
    fixQuillPickers(container.closest('.quill-editor-wrapper') || container);

    return quill;
};

/**
 * Fix Quill picker aria-hidden accessibility bug.
 * Quill sets aria-hidden on .ql-picker-options but focus moves inside them.
 */
function fixQuillPickers(wrapper) {
    if (!wrapper || wrapper._quillAriaFixed) return;
    wrapper._quillAriaFixed = true;

    // Listen for clicks on picker labels to open dropdowns
    wrapper.addEventListener('click', (e) => {
        const label = e.target.closest('.ql-picker-label');
        if (!label) return;

        // After Quill opens the dropdown, remove aria-hidden
        requestAnimationFrame(() => {
            const options = label.parentElement?.querySelector('.ql-picker-options');
            if (options) {
                options.removeAttribute('aria-hidden');
            }
        });
    });

    // Also handle keyboard navigation
    wrapper.addEventListener('mousedown', (e) => {
        const label = e.target.closest('.ql-picker-label');
        if (!label) return;

        requestAnimationFrame(() => {
            const options = label.parentElement?.querySelector('.ql-picker-options');
            if (options) {
                options.removeAttribute('aria-hidden');
            }
        });
    });
}

/**
 * Destroi um editor Quill específico.
 */
window.destroyQuill = function (container) {
    if (editors.has(container)) {
        const quill = editors.get(container);
        quill.setText('');
        editors.delete(container);
    }
};

/**
 * Re-inicializa editores dentro de um elemento (após morph do Livewire).
 */
export function initQuillEditors(el) {
    const containers = (el || document).querySelectorAll('[data-quill-editor]');
    containers.forEach((container) => {
        if (!editors.has(container)) {
            const property = container.dataset.quillEditor;
            const toolbar = container.dataset.quillToolbar || 'default';
            const wireEl = container.closest('[wire\\:id]');
            if (wireEl && window.Livewire) {
                const wireComponent = window.Livewire.find(wireEl.getAttribute('wire:id'));
                if (wireComponent) {
                    initQuill(container, wireComponent, property, { toolbar });
                }
            }
        }
    });
}

/**
 * Destrói todos os editores dentro de um elemento.
 */
export function destroyQuillEditors(el) {
    const containers = (el || document).querySelectorAll('[data-quill-editor]');
    containers.forEach((container) => {
        destroyQuill(container);
    });
}
