<?php

namespace App\Notifications\System;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class TaskCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $taskTitle,
        public ?string $responsibleName = null,
        public ?int $taskId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        $responsible = $this->responsibleName ? " para {$this->responsibleName}" : '';

        return [
            'title'   => 'Nova tarefa criada',
            'message' => "A tarefa \"{$this->taskTitle}\" foi criada{$responsible}.",
            'type'    => 'info',
            'icon'    => 'fa-solid fa-list-check',
            'url'     => $this->taskId ? route('dashboard.legal.tasks') : null,
        ];
    }
}
