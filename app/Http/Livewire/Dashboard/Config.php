<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Configuracoes;
use App\Traits\HasAlerts;

class Config extends Component
{
    use HasAlerts;

    public $app_name, $social_name, $init_date, $phone, $cell_phone, $whatsapp, $email;
    public $successMessage = '';
    public $errorMessage = '';

    public function mount()
    {
        $this->loadConfig();
    }

    public function loadConfig()
    {
        $config = Configuracoes::find(1);
        if ($config) {
            $this->app_name = $config->app_name;
            $this->social_name = $config->social_name;
            $this->init_date = $config->init_date;
            $this->phone = $config->phone;
            $this->cell_phone = $config->cell_phone;
            $this->whatsapp = $config->whatsapp;
            $this->email = $config->email;
        }
    }

    public function update()
    {
        $this->validate([
            'app_name' => 'sometimes|required|string|max:255',
            'social_name' => 'sometimes|nullable|string|max:255',
            'init_date' => 'sometimes|nullable|integer|min:2000|max:' . date('Y'),
            'phone' => 'sometimes|nullable|string|max:255',
            'cell_phone' => 'sometimes|nullable|string|max:255',
            'whatsapp' => 'sometimes|nullable|string|max:255',
            'email' => 'sometimes|nullable|email|max:255',
        ]);

        $config = Configuracoes::find(1);
        if ($config) {
            $config->app_name = $this->app_name ?: $config->app_name;
            $config->social_name = $this->social_name ?: $config->social_name;
            $config->init_date = $this->init_date ?: $config->init_date;
            $config->phone = $this->phone ?: $config->phone;
            $config->cell_phone = $this->cell_phone ?: $config->cell_phone;
            $config->whatsapp = $this->whatsapp ?: $config->whatsapp;
            $config->email = $this->email ?: $config->email;
            $config->save();
        }

        $this->loadConfig();
        $this->toastSuccess('Configurações salvas com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.config')->layout('layouts.admin', ['title' => 'Configurações']);
    }
}
