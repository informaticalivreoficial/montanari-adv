<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;

class Create extends Component
{
    use HasAlerts, WithFileUploads;

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

    /**
     * Auto-complete de endereço via CEP
     */
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

    public function store()
    {
        // Validação simplificada
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|exists:roles,name',
        ];

        // Validação condicional da senha
        if ($this->password) {
            $rules['password'] = 'string|min:8';
            $rules['password_confirmation'] = 'required_with:password|same:password';
        }

        // Validação do avatar
        if ($this->avatar) {
            $rules['avatar'] = 'image|max:2048';
        }

        $this->validate($rules);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            // Dados pessoais
            'gender' => $this->gender ?: null,
            'cpf' => $this->cpf ?: null,
            'rg' => $this->rg ?: null,
            'rg_expedition' => $this->rg_expedition ?: null,
            'birthday' => $this->birthday ?: null,
            'naturalness' => $this->naturalness ?: null,
            'civil_status' => $this->civil_status ?: null,
            // Endereço
            'zipcode' => $this->zipcode ?: null,
            'street' => $this->street ?: null,
            'number' => $this->number ?: null,
            'complement' => $this->complement ?: null,
            'neighborhood' => $this->neighborhood ?: null,
            'state' => $this->state ?: null,
            'city' => $this->city ?: null,
            // Contato
            'phone' => $this->phone ?: null,
            'cell_phone' => $this->cell_phone ?: null,
            'whatsapp' => $this->whatsapp ?: null,
            'telegram' => $this->telegram ?: null,
            'additional_email' => $this->additional_email ?: null,
            // Redes sociais
            'facebook' => $this->facebook ?: null,
            'twitter' => $this->twitter ?: null,
            'instagram' => $this->instagram ?: null,
            'linkedin' => $this->linkedin ?: null,
            // Profissional
            'position' => $this->position ?: null,
            'department' => $this->department ?: null,
            'biography' => $this->biography ?: null,
            // Outros
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

        // Cria o diretório se não existir
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $fullPath = "{$path}/{$filename}";

        // Converte para WebP
        $image = Image::make($file->getRealPath());
        $image->encode('webp', 85);
        $image->save($fullPath);

        return "{$folder}/{$filename}";
    }

    public function render()
    {
        return view('livewire.dashboard.Users.create')->layout('layouts.admin', ['title' => 'Novo Usuário']);
    }
}
