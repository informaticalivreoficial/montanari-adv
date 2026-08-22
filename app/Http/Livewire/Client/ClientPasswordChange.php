<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasAlerts;

class ClientPasswordChange extends Component
{
    use HasAlerts;

    public $current_password = '';
    public $new_password = '';
    public $new_password_confirmation = '';

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password'     => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->current_password, $user->password)) {
            $this->addError('current_password', 'A senha atual está incorreta.');
            return;
        }

        $user->update([
            'password' => bcrypt($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        $this->toastSuccess('Senha alterada com sucesso!');
        return redirect()->route('client.profile');
    }

    public function render()
    {
        return view('livewire.client.client-password-change')->layout('layouts.client', ['title' => 'Alterar Senha']);
    }
}
