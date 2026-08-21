<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ForgotPassword extends Component
{
    public $email = '';

    protected $rules = [
        'email' => 'required|email',
    ];

    protected $messages = [
        'email.required' => 'Informe o e-mail para recuperação de senha.',
        'email.email'    => 'Informe um endereço de e-mail válido.',
    ];

    public function sendResetLink()
    {
        $this->validate();

        $key = 'forgot-password:' . Str::lower($this->email);

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('email', "Muitas tentativas. Tente novamente em {$seconds} segundos.");
            return;
        }

        RateLimiter::hit($key, 120);

        try {
            $status = Password::sendResetLink(['email' => $this->email]);

            if ($status !== Password::RESET_LINK_SENT) {
                $this->addError('email', 'Não encontramos uma conta com esse e-mail.');
                return;
            }
        } catch (\Throwable $e) {
            report($e);
            $this->addError('email', 'Não foi possível enviar o e-mail neste momento. Verifique a configuração de e-mail ou tente mais tarde.');
            return;
        }

        session()->flash('status', 'Enviamos o link de redefinição de senha para o seu e-mail.');
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.auth', ['title' => 'Recuperar senha']);
    }
}
