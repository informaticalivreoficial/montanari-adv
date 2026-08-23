<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ClientLogin extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required'    => 'Informe o seu e-mail.',
        'email.email'       => 'Informe um endereço de e-mail válido.',
        'password.required' => 'Informe a sua senha.',
    ];

    public function authenticate()
    {
        $this->validate();

        $email = Str::lower(trim($this->email));
        $ip    = request()->ip();
        $key   = 'client-login:' . $ip;

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('general', "Muitas tentativas. Tente novamente em {$seconds} segundos.");
            return;
        }

        if (!Auth::attempt(['email' => $email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($key, 120);
            $this->addError('general', 'E-mail ou senha não conferem.');
            return;
        }

        RateLimiter::clear($key);

        $user = Auth::user();

        if ($user->status != 1) {
            Auth::logout();
            $this->addError('general', 'Sua conta está desativada. Entre em contato com o escritório.');
            return;
        }

        if (!$user->hasRole('client')) {
            Auth::logout();
            $this->addError('general', 'Acesso não autorizado. Esta é a área exclusiva dos clientes.');
            return;
        }

        session()->regenerate();

        return redirect()->intended(route('client.dashboard'));
    }

    public function render()
    {
        return view('livewire.client.client-login')->layout('layouts.client-auth', ['title' => 'Área do Cliente']);
    }
}
