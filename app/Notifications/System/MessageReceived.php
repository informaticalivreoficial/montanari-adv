<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class MessageReceived extends Notification
{
    public function __construct(
        public string $clientName,
        public string $subject,
        public string $preview,
        public ?int $messageId = null,
    ) {}

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toDatabase($notifiable): array
    {
        return [
            'title'   => 'Nova mensagem de ' . $this->clientName,
            'message' => ($this->subject ? $this->subject . ' — ' : '') . Str::limit($this->preview, 100),
            'type'    => 'info',
            'icon'    => 'fa-solid fa-comment-dots',
            'url'     => route('dashboard.messages'),
        ];
    }
}
