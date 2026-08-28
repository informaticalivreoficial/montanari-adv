<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\MagicLink;
use App\Mail\ClientMagicLink;

class ClientLogin extends Component
{
    public $email = '';
    public $linkSent = false;

    protected $rules = [
        'email' => 'required|email',
    ];

    protected $messages = [
        'email.required' => 'Informe o seu e-mail.',
        'email.email'    => 'Informe um endereço de e-mail válido.',
    ];

    /**
     * Envia magic link por e-mail.
     */
    public function sendLink()
    {
        $this->validate();

        $email = Str::lower(trim($this->email));
        $ip    = request()->ip();
        $key   = 'client-magic-link:' . $ip;

        // Rate limit: 3 tentativas por IP a cada 120s
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('general', "Muitas tentativas. Tente novamente em {$seconds} segundos.");
            return;
        }

        // Buscar usuário client com este email
        $user = User::where('email', $email)->first();

        // Por segurança, sempre mostra sucesso (não revela se email existe)
        $this->linkSent = true;

        if (!$user || !$user->hasRole('client') || $user->status != 1) {
            RateLimiter::hit($key, 120);
            return;
        }

        // Gerar token e enviar email
        $magicLink = MagicLink::generateFor($user);
        $url = route('client.magic-link.verify', [
            'token' => $magicLink->token,
            'email' => $magicLink->email,
        ]);

        Mail::to($user->email)->send(new ClientMagicLink(
            userName: $user->name,
            magicLinkUrl: $url,
        ));

        RateLimiter::hit($key, 120);
    }

    /**
     * Volta para o formulário de email.
     */
    public function backToForm()
    {
        $this->reset(['email', 'linkSent']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.client.client-login')->layout('layouts.client-auth', ['title' => 'Área do Cliente']);
    }
}
