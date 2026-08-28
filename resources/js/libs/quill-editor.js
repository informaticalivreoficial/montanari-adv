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
        ['link', 'image', 'blockquote'],
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
        ['link', 'image', 'video', 'blockquote', 'code-block'],
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

    // Toolbar flutuante pra imagens
    initImageToolbar(container);

    return quill;
};

/**
 * Toolbar flutuante: aparece ao clicar em imagem dentro do editor.
 * Permite alinhar, redimensionar e remover.
 */
function initImageToolbar(quillRoot) {
    let activeImg = null;
    let floatingBar = null;

    function hideBar() {
        if (floatingBar) {
            floatingBar.remove();
            floatingBar = null;
        }
        activeImg = null;
    }

    function showBar(img) {
        hideBar();
        activeImg = img;

        floatingBar = document.createElement('div');
        floatingBar.className = 'ql-image-toolbar-floating';

        const buttons = [
            { icon: '⬅', tip: 'Esquerda', fn: () => { img.style.display = 'block'; img.style.margin = '0 auto 0 0'; } },
            { icon: '⬛', tip: 'Centro', fn: () => { img.style.display = 'block'; img.style.margin = '0 auto'; } },
            { icon: '➡', tip: 'Direita', fn: () => { img.style.display = 'block'; img.style.margin = '0 0 0 auto'; } },
            { icon: '↔', tip: 'Largura total', fn: () => { img.style.width = '100%'; img.style.height = ''; refresh(); } },
            { icon: '⊡', tip: 'Original', fn: () => { img.style.width = ''; img.style.height = ''; refresh(); } },
            { icon: '−', tip: 'Reduzir', fn: () => { resizeImg(-10); } },
            { icon: '+', tip: 'Aumentar', fn: () => { resizeImg(10); } },
            { icon: '✕', tip: 'Remover', fn: () => { img.remove(); hideBar(); } },
        ];

        buttons.forEach(b => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = b.icon;
            btn.title = b.tip;
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                b.fn();
            });
            floatingBar.appendChild(btn);
        });

        quillRoot.style.position = 'relative';
        quillRoot.appendChild(floatingBar);

        positionBar();
    }

    function positionBar() {
        if (!floatingBar || !activeImg) return;
        const rootRect = quillRoot.getBoundingClientRect();
        const imgRect = activeImg.getBoundingClientRect();
        floatingBar.style.top = `${imgRect.top - rootRect.top + quillRoot.scrollTop - 38}px`;
        floatingBar.style.left = `${imgRect.left - rootRect.left + imgRect.width / 2}px`;
        floatingBar.style.transform = 'translateX(-50%)';
    }

    function refresh() {
        setTimeout(() => {
            if (activeImg && floatingBar) positionBar();
        }, 50);
    }

    function resizeImg(pct) {
        if (!activeImg) return;
        const parent = quillRoot.offsetWidth;
        const cur = activeImg.offsetWidth || parent;
        const next = Math.max(50, Math.min(parent, cur + parent * pct / 100));
        activeImg.style.width = `${next}px`;
        activeImg.style.height = '';
        refresh();
    }

    // Event listeners
    quillRoot.addEventListener('click', (e) => {
        if (e.target.tagName === 'IMG') {
            e.preventDefault();
            showBar(e.target);
        } else if (floatingBar && !floatingBar.contains(e.target)) {
            hideBar();
        }
    });

    quillRoot.addEventListener('scroll', () => {
        if (floatingBar && activeImg) positionBar();
    });
}

/**
 * Fix Quill picker aria-hidden accessibility bug.
 */
function fixQuillPickers(wrapper) {
    if (!wrapper || wrapper._quillAriaFixed) return;
    wrapper._quillAriaFixed = true;

    wrapper.addEventListener('click', (e) => {
        const label = e.target.closest('.ql-picker-label');
        if (!label) return;
        requestAnimationFrame(() => {
            const options = label.parentElement?.querySelector('.ql-picker-options');
            if (options) options.removeAttribute('aria-hidden');
        });
    });

    wrapper.addEventListener('mousedown', (e) => {
        const label = e.target.closest('.ql-picker-label');
        if (!label) return;
        requestAnimationFrame(() => {
            const options = label.parentElement?.querySelector('.ql-picker-options');
            if (options) options.removeAttribute('aria-hidden');
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
