<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Notification;

class DeadlineCreated extends Notification 
{

    public function __construct(
        public string $title,
        public string $dueDate,
        public string $priorityLabel,
        public ?int $deadlineId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title'   => 'Novo prazo cadastrado',
            'message' => "O prazo \"{$this->title}\" foi criado com vencimento em {$this->dueDate} ({$this->priorityLabel}).",
            'type'    => 'warning',
            'icon'    => 'fa-solid fa-clock',
            'url'     => $this->deadlineId ? route('dashboard.legal.deadlines') : null,
        ];
    }
}
