import Swal from 'sweetalert2';

/**
 * Helper global do SweetAlert2.
 *
 * Disponível globalmente:
 *   window.MontanariAlert.success('Salvo com sucesso!')
 *   window.MontanariAlert.error('Erro ao salvar.')
 *   window.MontanariAlert.confirm({ title: 'Excluir?' }).then(...)
 *   window.MontanariAlert.warning('Atenção!')
 *   window.MontanariAlert.info('Informação')
 */
const MontanariAlert = {
    success(title, options = {}) {
        return Swal.fire({
            icon: 'success',
            title,
            timer: 2500,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timerProgressBar: true,
            ...options,
        });
    },

    error(title, options = {}) {
        return Swal.fire({
            icon: 'error',
            title,
            timer: 4000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timerProgressBar: true,
            ...options,
        });
    },

    warning(title, options = {}) {
        return Swal.fire({
            icon: 'warning',
            title,
            timer: 3500,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timerProgressBar: true,
            ...options,
        });
    },

    info(title, options = {}) {
        return Swal.fire({
            icon: 'info',
            title,
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            timerProgressBar: true,
            ...options,
        });
    },

    confirm(options = {}) {
        return Swal.fire({
            title: options.title || 'Tem certeza?',
            text: options.text || '',
            html: options.html || undefined,
            icon: options.icon || 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d97706',
            cancelButtonColor: '#6b7280',
            confirmButtonText: options.confirmButtonText || 'Sim, confirmar',
            cancelButtonText: options.cancelButtonText || 'Cancelar',
            reverseButtons: true,
            ...options,
        });
    },

    prompt(options = {}) {
        return Swal.fire({
            title: options.title || 'Digite um valor',
            input: options.input || 'text',
            inputLabel: options.inputLabel || '',
            inputValue: options.inputValue || '',
            showCancelButton: true,
            confirmButtonColor: '#d97706',
            cancelButtonColor: '#6b7280',
            confirmButtonText: options.confirmButtonText || 'Confirmar',
            cancelButtonText: options.cancelButtonText || 'Cancelar',
            inputValidator: options.inputValidator || undefined,
            ...options,
        });
    },

    close() {
        Swal.close();
    },

    setDefaults(defaults) {
        Swal.mixin(defaults);
    },
};

/**
 * Registra eventos Livewire para SweetAlert2.
 * Escuta tanto Livewire.on() quanto window.addEventListener.
 */
export function initSweetAlert(livewire) {
    // Via Livewire.on (Livewire v3 compat)
    livewire.on('swal:fire', (options) => {
        if (typeof options === 'string') {
            MontanariAlert.success(options);
        } else {
            Swal.fire(options);
        }
    });

    livewire.on('swal:success', (message) => {
        MontanariAlert.success(message || 'Operação realizada com sucesso!');
    });

    livewire.on('swal:error', (message) => {
        MontanariAlert.error(message || 'Ocorreu um erro.');
    });

    livewire.on('swal:confirm', (options) => {
        const opts = typeof options === 'string'
            ? { title: options }
            : options;

        MontanariAlert.confirm(opts).then((result) => {
            if (result.isConfirmed && opts.method) {
                livewire.call(opts.method, ...(opts.params || []));
            }
        });
    });
}

/**
 * Atalho para confirmação via JS
 */
export function MontanariConfirm(options = {}) {
    return MontanariAlert.confirm(options);
}

// Copia propriedades
Object.assign(MontanariConfirm, MontanariAlert);

export default MontanariAlert;
