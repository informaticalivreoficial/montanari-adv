<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class ContactFormNotification extends Notification
{

    public function __construct(
        public string $nome,
        public string $email,
        public string $mensagem,
    ) {}

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Novo contato via site — ' . $this->nome)
            ->greeting('Nova mensagem de contato')
            ->line("**Nome:** {$this->nome}")
            ->line("**E-mail:** {$this->email}")
            ->line("**Mensagem:**")
            ->line($this->mensagem)
            ->action('Ver painel', route('dashboard'));
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title'   => 'Novo contato via site',
            'message' => "{$this->nome} ({$this->email}) enviou uma mensagem: " . Str::limit($this->mensagem, 100),
            'type'    => 'info',
            'icon'    => 'fa-solid fa-envelope',
            'url'     => null,
        ];
    }
}
