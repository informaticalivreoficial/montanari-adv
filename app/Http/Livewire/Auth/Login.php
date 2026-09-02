<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required'    => 'Informe o seu e-mail de acesso.',
        'email.email'       => 'Informe um endereço de e-mail válido.',
        'password.required' => 'Informe a sua senha.',
    ];

    public function authenticate()
    {
        $this->validate();

        $email = Str::lower(trim($this->email));
        $ip    = request()->ip();
        $key   = 'login:' . $ip;

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('email', "Conta bloqueada temporariamente. Tente novamente em {$seconds} segundos.");
            return;
        }

        if (! Auth::attempt(['email' => $email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($key, 120);
            $this->addError('email', 'E-mail ou senha não conferem.');
            return;
        }

        RateLimiter::clear($key);

        $user = Auth::user();

        if ($user->status != 1) {
            Auth::logout();
            $this->addError('email', 'Sua conta está desativada. Entre em contato com o administrador.');
            return;
        }

        if (! $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) {
            Auth::logout();
            $this->addError('email', 'Usuário sem permissão para acessar o painel.');
            return;
        }

        $user->forceFill([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
        ])->save();

        session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.auth', ['title' => 'Entrar']);
    }
}
