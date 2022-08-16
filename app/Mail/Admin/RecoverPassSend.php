<?php

namespace App\Mail\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoverPassSend extends Mailable
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
        $this->replyTo($this->data['email'], $this->data['username']);
        $this->to($this->data['email'], $this->data['username']);
        $this->from($this->data['email'], $this->data['username']);
        $this->subject('#Redefinição de Senha');
        $this->markdown('admin.email.sendrecoverpass', [
            'remember_token' => base64_encode($this->data['remember_token']),
            'nome' => $this->data['username'],
            'telefone1' => $this->data['telefone1'],
            'ano_de_inicio' => $this->data['ano_de_inicio'],
            'emailsite' => $this->data['emailsite'],
            'sitename' => $this->data['sitename']
        ]);
        return $this;        
    }
}
