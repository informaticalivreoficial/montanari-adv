<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $phone = '';
    public $accept_terms = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'nullable|string|max:20',
        'accept_terms' => 'required|accepted',
    ];

    protected $messages = [
        'name.required' => 'Informe o seu nome completo.',
        'name.max' => 'O nome não pode ter mais de 255 caracteres.',
        'email.required' => 'Informe o seu e-mail.',
        'email.email' => 'Informe um endereço de e-mail válido.',
        'email.unique' => 'Este e-mail já está cadastrado.',
        'password.required' => 'Informe uma senha.',
        'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
        'password.confirmed' => 'As senhas não conferem.',
        'accept_terms.required' => 'Você precisa aceitar os termos de uso.',
        'accept_terms.accepted' => 'Você precisa aceitar os termos de uso.',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone' => $this->phone,
            'status' => 1,
        ]);

        // Atribuir role de cliente
        $user->assignRole('client');

        // Login automático
        Auth::login($user);

        session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth', ['title' => 'Criar Conta']);
    }
}
