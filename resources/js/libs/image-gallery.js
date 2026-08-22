import Sortable from 'sortablejs';
import 'fslightbox';

// Expor Sortable globalmente para uso no Alpine.js
if (typeof window !== 'undefined') {
    window.Sortable = Sortable;
}

/**
 * Image Gallery - Galeria de imagens avançada com:
 * - Sortable (drag & drop para ordenar)
 * - Lightbox (visualização em tela cheia)
 * - Preview (pré-visualização de novos uploads)
 * - Marcar capa
 * - Excluir
 * - Legenda da capa (thumb_caption)
 */

// Inicializa lightbox do fslightbox
export function initFsLightbox() {
    if (typeof fsLightbox !== 'undefined') {
        fsLightbox.props = { ...fsLightbox.props, ...{ type: 'image', slideshowAutoplay: false } };
    }
}

// Inicializa Sortable em um container
export function initSortable(el, wireComponent) {
    if (!el || el._sortable) return;

    el._sortable = Sortable.create(el, {
        animation: 200,
        ghostClass: 'opacity-40',
        chosenClass: 'ring-2 ring-amber-500',
        dragClass: 'shadow-xl',
        handle: '.gallery-drag-handle',
        onEnd: function (evt) {
            // Coleta a nova ordem
            const items = el.querySelectorAll('[data-image-id]');
            const order = Array.from(items).map((item, index) => ({
                id: parseInt(item.dataset.imageId),
                order: index,
            }));

            // Envia para o Livewire
            if (wireComponent && wireComponent.reorderImages) {
                wireComponent.reorderImages(order);
            }
        },
    });
}

// Preview de imagens selecionadas no input de upload
export function initImagePreview(inputEl, previewEl) {
    if (!inputEl || !previewEl) return;

    inputEl.addEventListener('change', function (e) {
        const files = Array.from(e.target.files);
        if (!files.length) return;

        previewEl.innerHTML = '';
        previewEl.classList.remove('hidden');

        files.forEach((file) => {
            if (!file.type.startsWith('image/')) return;

            const reader = new FileReader();
            reader.onload = function (ev) {
                const div = document.createElement('div');
                div.className = 'relative group rounded-lg overflow-hidden border border-gray-200 aspect-square';
                div.innerHTML = `
                    <img src="${ev.target.result}" alt="" class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <span class="rounded-lg bg-white/90 px-3 py-1.5 text-xs font-medium text-gray-700">
                            <i class="fa-solid fa-eye mr-1"></i> Pré-visualização
                        </span>
                    </div>
                `;
                previewEl.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    });
}
