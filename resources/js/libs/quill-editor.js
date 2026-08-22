/**
 * Quill Editor Helper
 *
 * Inicializa editores Quill e sincroniza com Livewire.
 *
 * Uso no blade:
 *   <div wire:ignore x-data x-init="initQuill($refs.editor, $wire, 'fieldName')">
 *       <div x-ref="editor"></div>
 *   </div>
 *   <input type="hidden" wire:model="fieldName" />
 */

import Quill from 'quill';

const editors = new Map();

const TOOLBAR_OPTIONS = [
    [{ header: [1, 2, 3, false] }],
    ['bold', 'italic', 'underline', 'strike'],
    [{ color: [] }, { background: [] }],
    [{ list: 'ordered' }, { list: 'bullet' }],
    [{ align: [] }],
    ['link', 'blockquote'],
    ['clean'],
];

/**
 * Inicializa um editor Quill em um container.
 * @param {HTMLElement} container - Elemento onde o editor será renderizado
 * @param {Object} wire - Instância do componente Livewire ($wire)
 * @param {string} property - Nome da propriedade no Livewire
 */
window.initQuill = function (container, wire, property) {
    if (!container || editors.has(container)) return;

    const initialContent = wire[property] || '';

    const quill = new Quill(container, {
        theme: 'snow',
        modules: {
            toolbar: TOOLBAR_OPTIONS,
        },
        placeholder: 'Digite o conteúdo aqui...',
    });

    // Define conteúdo inicial
    if (initialContent) {
        quill.root.innerHTML = initialContent;
    }

    // Sincroniza com Livewire a cada mudança (com debounce)
    let timeout;
    quill.on('text-change', () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            wire[property] = quill.root.innerHTML;
        }, 300);
    });

    editors.set(container, quill);

    return quill;
};

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
            // O componente pai do Livewire está disponível via $wire no Alpine
            // Mas aqui precisamos encontrar o wire component
            const wireEl = container.closest('[wire\\:id]');
            if (wireEl && window.Livewire) {
                const wireComponent = window.Livewire.find(wireEl.getAttribute('wire:id'));
                if (wireComponent) {
                    initQuill(container, wireComponent, property);
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
