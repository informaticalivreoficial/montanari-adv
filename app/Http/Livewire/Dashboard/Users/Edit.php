<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;

class Edit extends Component
{
    use HasAlerts, WithFileUploads;

    public $userId;
    public $user = null;

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
    public $currentAvatar = '';

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

    public function mount($id)
    {
        $this->userId = $id;
        $this->roles = Role::all()->toArray();
        $this->loadUser();
    }

    public function loadUser()
    {
        $this->user = User::with('roles', 'permissions')->findOrFail($this->userId);

        $this->name = $this->user->name ?? '';
        $this->email = $this->user->email ?? '';
        // Dados pessoais
        $this->gender = $this->user->gender ?? '';
        $this->cpf = $this->user->cpf ?? '';
        $this->rg = $this->user->rg ?? '';
        $this->rg_expedition = $this->user->rg_expedition ?? '';
        $this->birthday = $this->user->birthday ?? '';
        $this->naturalness = $this->user->naturalness ?? '';
        $this->civil_status = $this->user->civil_status ?? '';
        // Avatar
        $this->currentAvatar = $this->user->url_avatar ?? '';
        // Endereço
        $this->zipcode = $this->user->zipcode ?? '';
        $this->street = $this->user->street ?? '';
        $this->number = $this->user->number ?? '';
        $this->complement = $this->user->complement ?? '';
        $this->neighborhood = $this->user->neighborhood ?? '';
        $this->state = $this->user->state ?? '';
        $this->city = $this->user->city ?? '';
        // Contato
        $this->phone = $this->user->phone ?? '';
        $this->cell_phone = $this->user->cell_phone ?? '';
        $this->whatsapp = $this->user->whatsapp ?? '';
        $this->telegram = $this->user->telegram ?? '';
        $this->additional_email = $this->user->additional_email ?? '';
        // Redes sociais
        $this->facebook = $this->user->facebook ?? '';
        $this->twitter = $this->user->twitter ?? '';
        $this->instagram = $this->user->instagram ?? '';
        $this->linkedin = $this->user->linkedin ?? '';
        // Profissional
        $this->position = $this->user->position ?? '';
        $this->department = $this->user->department ?? '';
        $this->biography = $this->user->biography ?? '';
        // Acesso
        $this->role = $this->user->roles->first()?->name ?? '';
        // Outros
        $this->information = $this->user->information ?? '';
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

    public function update()
    {
        // Validação simplificada
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->userId,
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

        // Só atualiza a senha se foi informada
        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        // Upload do avatar como WebP
        if ($this->avatar) {
            // Remove avatar antigo
            if ($this->user->avatar && \Storage::disk('public')->exists($this->user->avatar)) {
                \Storage::disk('public')->delete($this->user->avatar);
            }
            $data['avatar'] = $this->convertToWebp($this->avatar, 'avatars');
        }

        $this->user->update($data);

        // Atualizar roles
        $this->user->syncRoles([$this->role]);

        return redirect()->route('dashboard.users.edit', $this->userId)
            ->with('toast_success', 'Usuário atualizado com sucesso!');
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
        return view('livewire.dashboard.Users.edit')->layout('layouts.admin', ['title' => 'Editar Usuário']);
    }
}
