<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class EventCreated extends Notification
{
    public function __construct(
        public string $title,
        public string $startDate,
        public string $eventTypeLabel,
        public ?string $location = null,
        public ?string $processNumber = null,
        public ?int $eventId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable): MailMessage
    {
        $mail = (new MailMessage)
            ->subject("Novo evento na agenda — {$this->title}")
            ->greeting('Novo evento criado')
            ->line("**Título:** {$this->title}")
            ->line("**Tipo:** {$this->eventTypeLabel}")
            ->line("**Data:** {$this->startDate}");

        if ($this->location) {
            $mail->line("**Local:** {$this->location}");
        }

        if ($this->processNumber) {
            $mail->line("**Processo:** {$this->processNumber}");
        }

        return $mail->action('Ver agenda', route('dashboard.legal.agenda'));
    }

    public function toDatabase($notifiable): array
    {
        $message = "O evento \"{$this->title}\" ({$this->eventTypeLabel}) foi criado para {$this->startDate}.";

        if ($this->location) {
            $message .= " Local: {$this->location}.";
        }

        return [
            'title'   => 'Novo evento na agenda',
            'message' => $message,
            'type'    => 'info',
            'icon'    => 'fa-solid fa-calendar-check',
            'url'     => $this->eventId ? route('dashboard.legal.agenda') : null,
        ];
    }
}
