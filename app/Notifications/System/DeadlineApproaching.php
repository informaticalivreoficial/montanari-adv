<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Notification;

class DeadlineApproaching extends Notification 
{

    public function __construct(
        public string $title,
        public string $dueDate,
        public int $daysRemaining,
        public ?int $deadlineId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        $days = $this->daysRemaining === 1 ? '1 dia' : "{$this->daysRemaining} dias";

        return [
            'title'   => 'Prazo próximo do vencimento',
            'message' => "O prazo \"{$this->title}\" vence em {$days} ({$this->dueDate}).",
            'type'    => 'warning',
            'icon'    => 'fa-solid fa-triangle-exclamation',
            'url'     => $this->deadlineId ? route('dashboard.legal.deadlines') : null,
        ];
    }
}
