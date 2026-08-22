import Swal from 'sweetalert2';

/**
 * MontanariToast — SweetAlert2 em modo toast.
 *
 * Uso via JavaScript:
 *   MontanariToast.success('Salvo com sucesso!')
 *   MontanariToast.error('Erro ao salvar.')
 */

const MontanariToast = {
    show(options = {}) {
        const type = options.type || 'info';
        const iconMap = { success: 'success', error: 'error', warning: 'warning', info: 'info' };
        const timerMap = { success: 2500, error: 3500, warning: 3000, info: 3000 };

        return Swal.fire({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: options.duration || timerMap[type] || 3000,
            timerProgressBar: true,
            icon: iconMap[type] || 'info',
            title: options.message || options.text || '',
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            },
        });
    },

    success(message, options = {}) {
        return this.show({ message, type: 'success', ...options });
    },

    error(message, options = {}) {
        return this.show({ message, type: 'error', ...options });
    },

    warning(message, options = {}) {
        return this.show({ message, type: 'warning', ...options });
    },

    info(message, options = {}) {
        return this.show({ message, type: 'info', ...options });
    },

    clearAll() {
        Swal.close();
    },
};

/**
 * Registra eventos Livewire para MontanariToast
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
