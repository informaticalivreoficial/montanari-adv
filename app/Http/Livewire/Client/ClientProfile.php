<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ClientProfile extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user()->load('roles');
    }

    public function render()
    {
        return view('livewire.client.client-profile')->layout('layouts.client', ['title' => 'Meu Perfil']);
    }
}
