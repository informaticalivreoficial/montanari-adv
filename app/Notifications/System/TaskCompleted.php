<?php

namespace App\Notifications\System;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class TaskCompleted extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $taskTitle,
        public ?string $completedByName = null,
        public ?int $taskId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        $by = $this->completedByName ? " por {$this->completedByName}" : '';

        return [
            'title'   => 'Tarefa concluída',
            'message' => "A tarefa \"{$this->taskTitle}\" foi marcada como concluída{$by}.",
            'type'    => 'success',
            'icon'    => 'fa-solid fa-circle-check',
            'url'     => $this->taskId ? route('dashboard.legal.tasks') : null,
        ];
    }
}
