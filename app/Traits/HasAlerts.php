<?php

namespace App\Traits;

/**
 * Trait HasAlerts
 *
 * Fornece métodos de conveniência para SweetAlert2 e ToastifyJS
 * em componentes Livewire.
 *
 * Uso no componente:
 *   use HasAlerts;
 *
 *   public function save()
 *   {
 *       // ... salvar
 *       $this->toastSuccess('Salvo com sucesso!');
 *       // ou
 *       $this->alertSuccess('Registro salvo!');
 *       // ou
 *       $this->swalConfirm('Excluir registro?');
 *   }
 */
trait HasAlerts
{
    /**
     * Toast de sucesso
     */
    public function toastSuccess(string $message): void
    {
        session()->flash('toast_success', $message);
    }

    /**
     * Toast de erro
     */
    public function toastError(string $message): void
    {
        session()->flash('toast_error', $message);
    }

    /**
     * Toast de aviso
     */
    public function toastWarning(string $message): void
    {
        session()->flash('toast_warning', $message);
    }

    /**
     * Toast informativo
     */
    public function toastInfo(string $message): void
    {
        session()->flash('toast_success', $message);
    }

    /**
     * Toast customizado
     */
    public function toast(string $message, string $type = 'success'): void
    {
        $key = match($type) {
            'error' => 'toast_error',
            'warning' => 'toast_warning',
            default => 'toast_success',
        };
        session()->flash($key, $message);
    }

    /**
     * SweetAlert2 sucesso
     */
    public function alertSuccess(string $title, ?string $text = null): void
    {
        $this->toastSuccess($title);
    }

    /**
     * SweetAlert2 erro
     */
    public function alertError(string $title, ?string $text = null): void
    {
        $this->toastError($title);
    }

    /**
     * SweetAlert2 aviso
     */
    public function alertWarning(string $title, ?string $text = null): void
    {
        $this->toastWarning($title);
    }

    /**
     * SweetAlert2 informativo
     */
    public function alertInfo(string $title, ?string $text = null): void
    {
        $this->toastInfo($title);
    }

    /**
     * SweetAlert2 de confirmação — dispara um método do componente ao confirmar
     *
     * @param string $title      Título da confirmação
     * @param string $method     Método do componente a ser chamado
     * @param array  $params     Parâmetros para o método
     * @param string $text       Texto descritivo
     * @param string $confirmBtn Texto do botão de confirmação
     * @param string $cancelBtn  Texto do botão de cancelamento
     */
    public function swalConfirm(
        string $title,
        string $method = 'confirm',
        array $params = [],
        ?string $text = null,
        string $confirmBtn = 'Sim, confirmar',
        string $cancelBtn = 'Cancelar'
    ): void {
        session()->flash('swal_confirm', [
            'title' => $title,
            'text' => $text,
            'method' => $method,
            'params' => $params,
            'confirmButtonText' => $confirmBtn,
            'cancelButtonText' => $cancelBtn,
        ]);
    }

    /**
     * SweetAlert2 genérico
     */
    public function swal(array $options): void
    {
        $type = $options['icon'] ?? 'success';
        $title = $options['title'] ?? '';
        match($type) {
            'error' => $this->toastError($title),
            'warning' => $this->toastWarning($title),
            default => $this->toastSuccess($title),
        };
    }
}
