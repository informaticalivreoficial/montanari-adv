<?php

namespace App\Traits;

/**
 * Trait HasAlerts
 *
 * Alertas via SweetAlert2 — usa $this->dispatch() (Livewire v4).
 *
 * JS escuta via Livewire.on() ou window.addEventListener('swal:fire')
 */
trait HasAlerts
{
    /**
     * Toast de sucesso
     */
    public function toastSuccess(string $message): void
    {
        $this->dispatch('swal:fire', [
            'icon'  => 'success',
            'title' => $message,
            'timer' => 2500,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ]);
    }

    /**
     * Toast de erro
     */
    public function toastError(string $message): void
    {
        $this->dispatch('swal:fire', [
            'icon'  => 'error',
            'title' => $message,
            'timer' => 4000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ]);
    }

    /**
     * Toast de aviso
     */
    public function toastWarning(string $message): void
    {
        $this->dispatch('swal:fire', [
            'icon'  => 'warning',
            'title' => $message,
            'timer' => 3500,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ]);
    }

    /**
     * Toast informativo
     */
    public function toastInfo(string $message): void
    {
        $this->dispatch('swal:fire', [
            'icon'  => 'info',
            'title' => $message,
            'timer' => 3000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ]);
    }

    /**
     * Toast customizado
     */
    public function toast(string $message, string $type = 'success'): void
    {
        match ($type) {
            'error'   => $this->toastError($message),
            'warning' => $this->toastWarning($message),
            'info'    => $this->toastInfo($message),
            default   => $this->toastSuccess($message),
        };
    }

    /**
     * SweetAlert2 sucesso
     */
    public function alertSuccess(string $title, ?string $text = null): void
    {
        $payload = array_merge([
            'icon'  => 'success',
            'title' => $title,
            'timer' => 2500,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ], $text ? ['text' => $text] : []);

        $this->dispatch('swal:fire', $payload);
    }

    /**
     * SweetAlert2 erro
     */
    public function alertError(string $title, ?string $text = null): void
    {
        $payload = array_merge([
            'icon'  => 'error',
            'title' => $title,
            'timer' => 4000,
            'showConfirmButton' => false,
            'toast' => true,
            'position' => 'top-end',
            'timerProgressBar' => true,
        ], $text ? ['text' => $text] : []);

        $this->dispatch('swal:fire', $payload);
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
     * SweetAlert2 de confirmação — dispara método do componente ao confirmar
     */
    public function swalConfirm(
        string $title,
        string $method = 'confirm',
        array  $params = [],
        ?string $text = null,
        string $confirmBtn = 'Sim, confirmar',
        string $cancelBtn = 'Cancelar'
    ): void {
        $this->dispatch('swal:confirm', [
            'title'            => $title,
            'text'             => $text,
            'method'           => $method,
            'params'           => $params,
            'confirmButtonText' => $confirmBtn,
            'cancelButtonText'  => $cancelBtn,
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
