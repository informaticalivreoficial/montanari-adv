/**
 * Montanari Adv - Helpers Globais
 *
 * Inicializa todas as bibliotecas e integra com Livewire.
 *
 * Tudo agora usa SweetAlert2:
 *   window.MontanariAlert    → SweetAlert2 (alertas e confirmações)
 *   window.MontanariToast    → SweetAlert2 (toasts)
 *   window.MontanariConfirm  → SweetAlert2 (confirmações)
 */

import { initFlatpickr } from './flatpickr';
import { initIMask, destroyIMask } from './imask-helper';
import MontanariAlert, { initSweetAlert, MontanariConfirm } from './sweetalert';
import MontanariToast, { initToast } from './toast';
import { initQuillEditors, destroyQuillEditors } from './quill-editor';
import './fullcalendar';
import './chartjs';
import { initSortable, initImagePreview, initFsLightbox } from './image-gallery';

// Expor globalmente
window.MontanariAlert = MontanariAlert;
window.MontanariToast = MontanariToast;
window.MontanariConfirm = MontanariConfirm;

// Helpers de conveniência — todos usam SweetAlert2
window.showToast = (message, type = 'success') => MontanariToast.show({ message, type });
window.showAlert = (title, options = {}) => MontanariAlert.success(title, options);
window.showError = (title, options = {}) => MontanariAlert.error(title, options);
window.confirmAction = (options) => MontanariAlert.confirm(options);

// Inicializar quando DOM estiver pronto
document.addEventListener('DOMContentLoaded', () => {
    initFlatpickr();
    initIMask();

    // Aguarda Livewire estar pronto
    document.addEventListener('livewire:initialized', () => {
        const livewire = window.Livewire;

        // Registra eventos Livewire para Alert e Toast (ambos SweetAlert2)
        initSweetAlert(livewire);
        initToast(livewire);

        // Reinicializa libs após cada atualização do DOM do Livewire
        livewire.hook('morph.updated', ({ el }) => {
            initFlatpickr(el);
            initIMask(el);
            initQuillEditors(el);
            initFsLightbox();
        });

        // Limpa antes de destruir componente
        livewire.hook('morph.removing', ({ el }) => {
            destroyIMask(el);
            destroyQuillEditors(el);
        });
    });
});

export { initFlatpickr, initIMask, destroyIMask, MontanariAlert, MontanariToast, MontanariConfirm };
