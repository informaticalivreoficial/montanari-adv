<?php

namespace App\Http\Livewire\Dashboard\Clients;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;

class CreateClient extends Component
{
    use HasAlerts, HasValidations, WithFileUploads;

    // Informações Básicas
    public $name = '';
    public $email = '';

    // Dados Pessoais
    public $gender = '';
    public $cpf = '';
    public $rg = '';
    public $rg_expedition = '';
    public $birthday = '';
    public $naturalness = '';
    public $civil_status = '';

    // Foto
    public $avatar = null;

    // Endereço
    public $zipcode = '';
    public $street = '';
    public $number = '';
    public $complement = '';
    public $neighborhood = '';
    public $state = '';
    public $city = '';

    // Contato
    public $phone = '';
    public $cell_phone = '';
    public $whatsapp = '';
    public $telegram = '';
    public $additional_email = '';

    // Observações
    public $information = '';

    public function mount()
    {
        // Todos os roles do admin podem criar clientes (exceto client)
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) {
            abort(403, 'Acesso não autorizado.');
        }
    }

    // ─── Validação em Tempo Real ────────────────────────────────

    public function updatedName($value)
    {
        $this->validateOnly('name', [
            'name' => 'required|string|min:3|max:255',
        ], static::validationMessages(), static::validationAttributes());
    }

    public function updatedEmail($value)
    {
        $this->validateOnly('email', [
            'email' => 'required|email|max:255|unique:users,email',
        ], static::validationMessages(), static::validationAttributes());
    }

    public function updatedAvatar()
    {
        if ($this->avatar) {
            $this->validateOnly('avatar', [
                'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedAdditionalEmail($value)
    {
        if ($value) {
            $this->validateOnly('additional_email', [
                'additional_email' => 'nullable|email|max:255',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedCpf($value)
    {
        if ($value) {
            $this->validateOnly('cpf', [
                'cpf' => 'nullable|string|max:14',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedPhone($value)
    {
        if ($value) {
            $this->validateOnly('phone', [
                'phone' => 'nullable|string|max:15',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedCellPhone($value)
    {
        if ($value) {
            $this->validateOnly('cell_phone', [
                'cell_phone' => 'nullable|string|max:15',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedWhatsapp($value)
    {
        if ($value) {
            $this->validateOnly('whatsapp', [
                'whatsapp' => 'nullable|string|max:15',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    // ─── Auto-complete de endereço via CEP ──────────────────────

    public function updatedZipcode($value)
    {
        $cep = preg_replace('/\D/', '', $value);

        if (strlen($cep) === 8) {
            $this->autoCompleteAddress($cep);
        }
    }

    protected function autoCompleteAddress($cep)
    {
        $response = @file_get_contents("https://viacep.com.br/ws/{$cep}/json/");

        if ($response) {
            $data = json_decode($response, true);

            if (!isset($data['erro'])) {
                $this->street = $data['logradouro'] ?? '';
                $this->neighborhood = $data['bairro'] ?? '';
                $this->city = $data['localidade'] ?? '';
                $this->state = $data['uf'] ?? '';
                $this->complement = $data['complemento'] ?? '';
            }
        }
    }

    // ─── Validação Completa + Salvamento ────────────────────────

    public function store()
    {
        $rules = [
            'name'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'avatar'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'phone'    => 'nullable|string|max:15',
            'cell_phone' => 'nullable|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'additional_email' => 'nullable|email|max:255',
            'cpf'      => 'nullable|string|max:14',
        ];

        $this->validate($rules, static::validationMessages(), static::validationAttributes());

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender ?: null,
            'cpf' => $this->cpf ?: null,
            'rg' => $this->rg ?: null,
            'rg_expedition' => $this->rg_expedition ?: null,
            'birthday' => $this->birthday ?: null,
            'naturalness' => $this->naturalness ?: null,
            'civil_status' => $this->civil_status ?: null,
            'zipcode' => $this->zipcode ?: null,
            'street' => $this->street ?: null,
            'number' => $this->number ?: null,
            'complement' => $this->complement ?: null,
            'neighborhood' => $this->neighborhood ?: null,
            'state' => $this->state ?: null,
            'city' => $this->city ?: null,
            'phone' => $this->phone ?: null,
            'cell_phone' => $this->cell_phone ?: null,
            'whatsapp' => $this->whatsapp ?: null,
            'telegram' => $this->telegram ?: null,
            'additional_email' => $this->additional_email ?: null,
            'information' => $this->information ?: null,
            'status' => 1,
        ];

        // Upload do avatar como WebP
        if ($this->avatar) {
            $data['avatar'] = $this->convertToWebp($this->avatar, 'avatars');
        }

        $client = User::create($data);

        // Atribuir role client automaticamente
        $client->assignRole('client');

        return redirect()->route('dashboard.clients.edit', $client->id)
            ->with('toast_success', 'Cliente criado com sucesso!');
    }

    /**
     * Converte imagem para WebP usando Intervention Image
     */
    protected function convertToWebp($file, string $folder): string
    {
        $filename = uniqid() . '.webp';
        $path = "{$folder}/{$filename}";

        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $image = $manager->read($file->getRealPath());
        $content = (string) $image->toWebp(85);

        $disk = config('filesystems.disks.r2') ? 'r2' : 'public';
        \Storage::disk($disk)->put($path, $content);

        return $path;
    }

    public function render()
    {
        return view('livewire.dashboard.Clients.create-client')
            ->layout('layouts.admin', ['title' => 'Novo Cliente']);
    }
}
