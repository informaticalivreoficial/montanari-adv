<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use HasAlerts, HasValidations, WithFileUploads;

    // Informações Básicas
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

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

    // Redes Sociais
    public $facebook = '';
    public $twitter = '';
    public $instagram = '';
    public $linkedin = '';

    // Profissional
    public $position = '';
    public $department = '';
    public $biography = '';

    // Acesso
    public $role = '';

    // Outros
    public $information = '';

    // Dados
    public $roles = [];

    public function mount()
    {
        $this->roles = Role::all()->toArray();
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

    public function updatedPassword($value)
    {
        if ($value) {
            $this->validateOnly('password', [
                'password' => 'required|string|min:8',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedPasswordConfirmation($value)
    {
        if ($this->password) {
            $this->validateOnly('password_confirmation', [
                'password_confirmation' => 'required_with:password|same:password',
            ], static::validationMessages(), static::validationAttributes());
        }
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

    public function updatedRole($value)
    {
        $this->validateOnly('role', [
            'role' => 'required|exists:roles,name',
        ], static::validationMessages(), static::validationAttributes());
    }

    public function updatedFacebook($value)
    {
        if ($value) {
            $this->validateOnly('facebook', [
                'facebook' => 'nullable|url|max:255',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedInstagram($value)
    {
        if ($value) {
            $this->validateOnly('instagram', [
                'instagram' => 'nullable|url|max:255',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedLinkedin($value)
    {
        if ($value) {
            $this->validateOnly('linkedin', [
                'linkedin' => 'nullable|url|max:255',
            ], static::validationMessages(), static::validationAttributes());
        }
    }

    public function updatedTwitter($value)
    {
        if ($value) {
            $this->validateOnly('twitter', [
                'twitter' => 'nullable|url|max:255',
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
            'role'     => 'required|exists:roles,name',
            'avatar'   => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'phone'    => 'nullable|string|max:15',
            'cell_phone' => 'nullable|string|max:15',
            'whatsapp' => 'nullable|string|max:15',
            'additional_email' => 'nullable|email|max:255',
            'cpf'      => 'nullable|string|max:14',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter'  => 'nullable|url|max:255',
        ];

        // Senha obrigatória no create
        $rules['password'] = 'required|string|min:8';
        $rules['password_confirmation'] = 'required_with:password|same:password';

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
            'facebook' => $this->facebook ?: null,
            'twitter' => $this->twitter ?: null,
            'instagram' => $this->instagram ?: null,
            'linkedin' => $this->linkedin ?: null,
            'position' => $this->position ?: null,
            'department' => $this->department ?: null,
            'biography' => $this->biography ?: null,
            'information' => $this->information ?: null,
        ];

        // Senha (obrigatória no create)
        $data['password'] = bcrypt($this->password);

        // Upload do avatar como WebP
        if ($this->avatar) {
            $data['avatar'] = $this->convertToWebp($this->avatar, 'avatars');
        }

        $user = User::create($data);

        $user->assignRole($this->role);

        return redirect()->route('dashboard.users.edit', $user->id)
            ->with('toast_success', 'Usuário criado com sucesso!');
    }

    /**
     * Converte imagem para WebP usando Intervention Image
     */
    protected function convertToWebp($file, string $folder): string
    {
        $filename = uniqid() . '.webp';
        $path = storage_path("app/public/{$folder}");

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $fullPath = "{$path}/{$filename}";

        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        $image = $manager->read($file->getRealPath());
        $image->toWebp(85)->save($fullPath);

        return "{$folder}/{$filename}";
    }

    public function render()
    {
        return view('livewire.dashboard.Users.create')->layout('layouts.admin', ['title' => 'Novo Usuário']);
    }
}
