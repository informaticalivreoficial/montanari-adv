import Swal from 'sweetalert2';

/**
 * Helper global do SweetAlert2 para Livewire.
 *
 * Uso via JavaScript:
 *   Livewire.dispatch('swal:confirm', { title: 'Tem certeza?', ... })
 *
 * Uso via Livewire (no componente PHP):
 *   $this->dispatch('swal:confirm', title: 'Tem certeza?', text: 'Isso não pode ser desfeito.');
 *
 * Disponível globalmente:
 *   window.MontanariAlert.success('Salvo com sucesso!')
 *   window.MontanariAlert.error('Erro ao salvar.')
 *   window.MontanariAlert.confirm({ title: 'Excluir?' }).then(...)
 *   window.MontanariAlert.warning('Atenção!')
 *   window.MontanariAlert.info('Informação')
 */
const MontanariAlert = {
    /**
     * Alerta de sucesso
     */
    success(title, options = {}) {
        return Swal.fire({
            icon: 'success',
            title,
            timer: 2500,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            ...options,
        });
    },

    /**
     * Alerta de erro
     */
    error(title, options = {}) {
        return Swal.fire({
            icon: 'error',
            title,
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            ...options,
        });
    },

    /**
     * Alerta de aviso
     */
    warning(title, options = {}) {
        return Swal.fire({
            icon: 'warning',
            title,
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            ...options,
        });
    },

    /**
     * Alerta informativo
     */
    info(title, options = {}) {
        return Swal.fire({
            icon: 'info',
            title,
            timer: 3000,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            ...options,
        });
    },

    /**
     * Confirmação (promise) — exibe botões Confirm/Cancel
     * Retorna promise: .then(result => { if(result.isConfirmed) {...} })
     */
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

    /**
     * Prompt simples
     */
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

    /**
     * Fecha o alerta atual
     */
    close() {
        Swal.close();
    },

    /**
     * Configurações padrão do SweetAlert2
     */
    setDefaults(defaults) {
        Swal.mixin(defaults);
    },
};

/**
 * Registra eventos Livewire para SweetAlert2
 *
 * No componente Livewire, faça:
 *   $this->dispatch('swal:fire', [
 *       'icon'  => 'success',
 *       'title' => 'Salvo!',
 *       'text'  => 'Registro atualizado.',
 *   ]);
 *
 *   $this->dispatch('swal:confirm', [
 *       'title'       => 'Excluir registro?',
 *       'text'        => 'Esta ação não pode ser desfeita.',
 *       'confirmText' => 'Sim, excluir',
 *       'cancelText'  => 'Não',
 *       'method'      => 'delete',     // método do componente
 *       'params'      => [$this->id],  // parâmetros
 *   ]);
 */
export function initSweetAlert(livewire) {
    // sweetalert fire genérico
    livewire.on('swal:fire', (options) => {
        if (typeof options === 'string') {
            MontanariAlert.success(options);
        } else {
            Swal.fire(options);
        }
    });

    // sweetalert de sucesso
    livewire.on('swal:success', (message) => {
        MontanariAlert.success(message || 'Operação realizada com sucesso!');
    });

    // sweetalert de erro
    livewire.on('swal:error', (message) => {
        MontanariAlert.error(message || 'Ocorreu um erro.');
    });

    // sweetalert de confirmação que dispara método no componente
    livewire.on('swal:confirm', (options) => {
        const opts = typeof options === 'string'
            ? { title: options }
            : options;

        MontanariConfirm(opts).then((result) => {
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
    return MontanariConfirm.confirm(options);
}

// Copia propriedades
Object.assign(MontanariConfirm, MontanariAlert);

export default MontanariAlert;
