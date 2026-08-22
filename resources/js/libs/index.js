/**
 * Montanari Adv - Helpers Globais
 *
 * Inicializa todas as bibliotecas e integra com Livewire.
 *
 * Disponível globalmente:
 *   window.MontanariAlert    → SweetAlert2
 *   window.MontanariToast    → ToastifyJS
 *   window.MontanariConfirm  → SweetAlert2 confirm
 */

import { initFlatpickr } from './flatpickr';
import { initIMask, destroyIMask } from './imask-helper';
import MontanariAlert, { initSweetAlert, MontanariConfirm } from './sweetalert';
import MontanariToast, { initToast } from './toast';
import { initQuillEditors, destroyQuillEditors } from './quill-editor';

// Expor globalmente
window.MontanariAlert = MontanariAlert;
window.MontanariToast = MontanariToast;
window.MontanariConfirm = MontanariConfirm;

// Helpers de conveniência
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

        // Registra eventos Livewire para Alert e Toast
        initSweetAlert(livewire);
        initToast(livewire);

        // Reinicializa libs após cada atualização do DOM do Livewire
        livewire.hook('morph.updated', ({ el }) => {
            initFlatpickr(el);
            initIMask(el);
            initQuillEditors(el);
        });

        // Limpa antes de destruir componente
        livewire.hook('morph.removing', ({ el }) => {
            destroyIMask(el);
            destroyQuillEditors(el);
        });
    });
});

export { initFlatpickr, initIMask, destroyIMask, MontanariAlert, MontanariToast, MontanariConfirm };
