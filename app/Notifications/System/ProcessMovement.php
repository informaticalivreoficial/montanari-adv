<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Notification;

class ProcessMovement extends Notification 
{

    public function __construct(
        public string $processNumber,
        public string $sourceLabel,
        public string $description,
        public ?int $processId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title'   => "Movimentação — {$this->sourceLabel}",
            'message' => "O processo nº {$this->processNumber} teve uma nova movimentação: {$this->description}.",
            'type'    => 'info',
            'icon'    => 'fa-solid fa-gavel',
            'url'     => $this->processId ? route('dashboard.legal.processes') : null,
        ];
    }
}
