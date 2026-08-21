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
    public function toastSuccess(string $message, int $duration = 3000): void
    {
        $this->dispatch('toast:success', $message, $duration);
    }

    /**
     * Toast de erro
     */
    public function toastError(string $message, int $duration = 4000): void
    {
        $this->dispatch('toast:error', $message, $duration);
    }

    /**
     * Toast de aviso
     */
    public function toastWarning(string $message, int $duration = 3000): void
    {
        $this->dispatch('toast:warning', $message, $duration);
    }

    /**
     * Toast informativo
     */
    public function toastInfo(string $message, int $duration = 3000): void
    {
        $this->dispatch('toast:info', $message, $duration);
    }

    /**
     * Toast customizado
     */
    public function toast(string $message, string $type = 'info', array $options = []): void
    {
        $this->dispatch('toast:show', array_merge([
            'message' => $message,
            'type' => $type,
        ], $options));
    }

    /**
     * SweetAlert2 sucesso
     */
    public function alertSuccess(string $title, ?string $text = null): void
    {
        $payload = ['icon' => 'success', 'title' => $title];
        if ($text) $payload['text'] = $text;
        $this->dispatch('swal:fire', $payload);
    }

    /**
     * SweetAlert2 erro
     */
    public function alertError(string $title, ?string $text = null): void
    {
        $payload = ['icon' => 'error', 'title' => $title];
        if ($text) $payload['text'] = $text;
        $this->dispatch('swal:fire', $payload);
    }

    /**
     * SweetAlert2 aviso
     */
    public function alertWarning(string $title, ?string $text = null): void
    {
        $payload = ['icon' => 'warning', 'title' => $title];
        if ($text) $payload['text'] = $text;
        $this->dispatch('swal:fire', $payload);
    }

    /**
     * SweetAlert2 informativo
     */
    public function alertInfo(string $title, ?string $text = null): void
    {
        $payload = ['icon' => 'info', 'title' => $title];
        if ($text) $payload['text'] = $text;
        $this->dispatch('swal:fire', $payload);
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
        $this->dispatch('swal:confirm', [
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
        $this->dispatch('swal:fire', $options);
    }
}
