<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ClientResetPassword extends Component
{
    public $email;
    public $token;
    public $password = '';
    public $password_confirmation = '';

    public function mount($token)
    {
        $this->token = $token;
        $this->email = request()->query('email', '');
    }

    protected $rules = [
        'email'                 => 'required|email',
        'password'              => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
    ];

    protected $messages = [
        'email.required'                 => 'Informe o e-mail da conta.',
        'email.email'                    => 'Informe um endereço de e-mail válido.',
        'password.required'              => 'Defina uma nova senha.',
        'password.min'                   => 'A senha deve ter ao menos 8 caracteres.',
        'password.confirmed'             => 'As senhas não conferem.',
        'password_confirmation.required' => 'Confirme a nova senha.',
    ];

    public function resetPassword()
    {
        $this->validate();

        // Garante que só clientes (ativos) podem redefinir por esta rota
        $user = User::where('email', Str::lower(trim($this->email)))->first();

        if (! $user || ! $user->hasRole('client') || $user->status != 1) {
            $this->addError('email', 'O link de redefinição é inválido ou expirou.');
            return;
        }

        try {
            $status = Password::reset(
                [
                    'email'                 => $this->email,
                    'password'              => $this->password,
                    'password_confirmation' => $this->password_confirmation,
                    'token'                 => $this->token,
                ],
                function ($user, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                    ])->setRememberToken(Str::random(60));

                    $user->save();
                }
            );
        } catch (\Throwable $e) {
            report($e);
            $this->addError('email', 'Não foi possível redefinir a senha neste momento. Tente novamente.');
            return;
        }

        if ($status !== Password::PASSWORD_RESET) {
            $this->addError('email', 'O link de redefinição é inválido ou expirou.');
            return;
        }

        session()->flash('status', 'Senha redefinida com sucesso! Faça o login na área do cliente.');
        return redirect()->route('client.login');
    }

    public function render()
    {
        return view('livewire.client.client-reset-password')->layout('layouts.client-auth', ['title' => 'Redefinir senha']);
    }
}
