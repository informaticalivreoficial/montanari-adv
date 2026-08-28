<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientMagicLink extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $userName,
        public string $magicLinkUrl,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Link de Acesso — ' . config('app.name'),
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.client.magic-link',
        );
    }
}
