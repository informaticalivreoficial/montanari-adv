<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = URL::route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ]);

        return (new MailMessage)
            ->subject('Redefinição de senha — Montanari Adv')
            ->greeting('Olá, ' . ($notifiable->name ?? 'usuário') . '.')
            ->line('Recebemos uma solicitação para redefinir a senha da sua conta no Montanari Adv.')
            ->action('Redefinir senha', $url)
            ->line('Este link de redefinição expira em 60 minutos.')
            ->line('Se você não solicitou essa alteração, ignore este e-mail e nenhuma mudança será feita.');
    }
}
