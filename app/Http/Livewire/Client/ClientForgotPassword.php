<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\User;
use App\Notifications\ClientResetPasswordNotification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ClientForgotPassword extends Component
{
    public $email = '';

    protected $rules = [
        'email' => 'required|email',
    ];

    protected $messages = [
        'email.required' => 'Informe o e-mail da sua conta.',
        'email.email'    => 'Informe um endereço de e-mail válido.',
    ];

    public function sendResetLink()
    {
        $this->validate();

        $key = 'client-forgot-password:' . Str::lower($this->email);

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('email', "Muitas tentativas. Tente novamente em {$seconds} segundos.");
            return;
        }

        RateLimiter::hit($key, 120);

        $email = Str::lower(trim($this->email));
        $user  = User::where('email', $email)->where('status', 1)->first();

        // Só envia se for cliente ativo (admins usam o fluxo próprio deles)
        if ($user && $user->hasRole('client')) {
            try {
                $token = Password::createToken($user);
                $user->notify(new ClientResetPasswordNotification($token));
            } catch (\Throwable $e) {
                report($e);
                $this->addError('email', 'Não foi possível enviar o e-mail neste momento. Tente mais tarde.');
                return;
            }
        }

        // Mensagem sempre genérica — evita revelar se o e-mail existe
        session()->flash('status', 'Se essa conta existir, enviamos o link de redefinição de senha para o seu e-mail.');
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.client.client-forgot-password')->layout('layouts.client-auth', ['title' => 'Recuperar senha']);
    }
}
