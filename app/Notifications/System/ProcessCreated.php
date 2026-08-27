<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class ProcessCreated extends Notification 
{

    public function __construct(
        public string $processNumber,
        public string $clientName,
        public string $caseTypeLabel,
        public ?int $processId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title'   => 'Novo processo cadastrado',
            'message' => "O processo nº {$this->processNumber} ({$this->caseTypeLabel}) foi adicionado para o cliente {$this->clientName}.",
            'type'    => 'info',
            'icon'    => 'fa-solid fa-folder-plus',
            'url'     => $this->processId ? route('dashboard.legal.processes') : null,
        ];
    }
}
