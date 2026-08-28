<?php

namespace App\Notifications\System;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class OfficeReplied extends Notification
{
    public function __construct(
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
            'title'   => 'Nova resposta do escritório',
            'message' => Str::limit($this->preview, 100),
            'type'    => 'info',
            'icon'    => 'fa-solid fa-comment-dots',
            'url'     => route('client.messages'),
        ];
    }
}
