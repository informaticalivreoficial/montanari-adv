import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';

/**
 * Helper global do ToastifyJS para Livewire.
 *
 * Uso via JavaScript:
 *   window.MontanariToast.success('Salvo com sucesso!')
 *   window.MontanariToast.error('Erro ao salvar.')
 *   window.MontanariToast.warning('Atenção!')
 *   window.MontanariToast.info('Informação')
 *
 * Uso via Livewire (no componente PHP):
 *   $this->dispatch('toast:success', 'Salvo com sucesso!');
 *   $this->dispatch('toast:error', 'Erro ao salvar.');
 *   $this->dispatch('toast:show', ['message' => 'Customizado', 'type' => 'success']);
 *
 * Opções:
 *   message  → texto
 *   type     → success | error | warning | info
 *   duration → ms (padrão: 3000)
 *   gravity  → top | bottom
 *   position → left | center | right
 *   stopOnFocus → pausa ao hover
 */

const TOAST_STYLES = {
    success: {
        background: 'linear-gradient(135deg, #059669, #10b981)',
    },
    error: {
        background: 'linear-gradient(135deg, #dc2626, #ef4444)',
    },
    warning: {
        background: 'linear-gradient(135deg, #d97706, #f59e0b)',
    },
    info: {
        background: 'linear-gradient(135deg, #2563eb, #3b82f6)',
    },
};

const MontanariToast = {
    /**
     * Exibe um toast
     */
    show(options = {}) {
        const type = options.type || 'info';
        const style = TOAST_STYLES[type] || TOAST_STYLES.info;

        const toast = Toastify({
            text: options.message || options.text || '',
            duration: options.duration || 3000,
            gravity: options.gravity || 'top',
            position: options.position || 'right',
            stopOnFocus: options.stopOnFocus !== false,
            style: {
                borderRadius: '8px',
                padding: '12px 20px',
                fontSize: '14px',
                fontFamily: 'Inter, system-ui, sans-serif',
                color: '#fff',
                boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
                ...style,
                ...(options.style || {}),
            },
            onClick: options.onClick || undefined,
        });

        toast.showToast();
        return toast;
    },

    /**
     * Toast de sucesso
     */
    success(message, options = {}) {
        return this.show({ message, type: 'success', ...options });
    },

    /**
     * Toast de erro
     */
    error(message, options = {}) {
        return this.show({ message, type: 'error', duration: 4000, ...options });
    },

    /**
     * Toast de aviso
     */
    warning(message, options = {}) {
        return this.show({ message, type: 'warning', ...options });
    },

    /**
     * Toast informativo
     */
    info(message, options = {}) {
        return this.show({ message, type: 'info', ...options });
    },

    /**
     * Remove todos os toasts
     */
    clearAll() {
        const toasts = document.querySelectorAll('.toastify');
        toasts.forEach((t) => t.remove());
    },
};

/**
 * Registra eventos Livewire para ToastifyJS
 *
 * No componente Livewire, faça:
 *   $this->dispatch('toast:success', 'Salvo com sucesso!');
 *   $this->dispatch('toast:error', 'Erro ao salvar.');
 *   $this->dispatch('toast:show', ['message' => 'Customizado', 'type' => 'info', 'duration' => 5000]);
 */
export function initToast(livewire) {
    livewire.on('toast:success', (message) => {
        MontanariToast.success(typeof message === 'string' ? message : message.message || '');
    });

    livewire.on('toast:error', (message) => {
        MontanariToast.error(typeof message === 'string' ? message : message.message || '');
    });

    livewire.on('toast:warning', (message) => {
        MontanariToast.warning(typeof message === 'string' ? message : message.message || '');
    });

    livewire.on('toast:info', (message) => {
        MontanariToast.info(typeof message === 'string' ? message : message.message || '');
    });

    livewire.on('toast:show', (options) => {
        if (typeof options === 'string') {
            MontanariToast.info(options);
        } else {
            MontanariToast.show(options);
        }
    });
}

export default MontanariToast;
