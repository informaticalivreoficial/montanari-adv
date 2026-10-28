<?php

namespace App\Mail\Web;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Markdown;

class Atendimento extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fromAddress = config('mail.from.address');
        $fromName = config('mail.from.name');

        // Destinatário: MAIL_CONTACT_TO → e-mail das configurações → remetente.
        $to = config('mail.contact_to') ?: ($this->data['siteemail'] ?? null) ?: $fromAddress;

        return $this->from($fromAddress, $fromName)
            ->replyTo($this->data['reply_email'], $this->data['reply_name'])
            ->to($to)
            ->subject('#Atendimento: ' . $this->data['reply_name'])
            ->markdown('emails.atendimento', [
                'nome' => $this->data['reply_name'],
                'email' => $this->data['reply_email'],
                'mensagem' => $this->data['mensagem']
            ]);
    }
}
