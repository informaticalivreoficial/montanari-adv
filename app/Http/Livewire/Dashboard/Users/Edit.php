<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    use HasAlerts, HasValidations, WithFileUploads;

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

        $roleQuery = Role::query();
        if (auth()->user()->hasRole('admin')) {
            $roleQuery->where('name', '!=', 'super-admin');
        } elseif (auth()->user()->hasRole('manager')) {
            $roleQuery->where('name', 'client');
        }
        $this->roles = $roleQuery->get()->toArray();

        $this->loadUser();

        Gate::authorize('update', $this->user);
    }

    public function loadUser()
    {
        $this->user = User::with('roles', 'permissions')->findOrFail($this->userId);

        $this->name = $this->user->name ?? '';
        $this->email = $this->user->email ?? '';
        $this->gender = $this->user->gender ?? '';
        $this->cpf = $this->user->cpf ?? '';
        $this->rg = $this->user->rg ?? '';
        $this->rg_expedition = $this->user->rg_expedition ?? '';
        $this->birthday = $this->user->birthday ?? '';
        $this->naturalness = $this->user->naturalness ?? '';
        $this->civil_status = $this->user->civil_status ?? '';
        $this->currentAvatar = $this->user->url_avatar ?? '';
        $this->zipcode = $this->user->zipcode ?? '';
        $this->street = $this->user->street ?? '';
        $this->number = $this->user->number ?? '';
        $this->complement = $this->user->complement ?? '';
        $this->neighborhood = $this->user->neighborhood ?? '';
        $this->state = $this->user->state ?? '';
        $this->city = $this->user->city ?? '';
        $this->phone = $this->user->phone ?? '';
        $this->cell_phone = $this->user->cell_phone ?? '';
        $this->whatsapp = $this->user->whatsapp ?? '';
        $this->telegram = $this->user->telegram ?? '';
        $this->additional_email = $this->user->additional_email ?? '';
        $this->facebook = $this->user->facebook ?? '';
        $this->twitter = $this->user->twitter ?? '';
        $this->instagram = $this->user->instagram ?? '';
        $this->linkedin = $this->user->linkedin ?? '';
        $this->position = $this->user->position ?? '';
        $this->department = $this->user->department ?? '';
        $this->biography = $this->user->biography ?? '';
        $this->role = $this->user->roles->first()?->name ?? '';
        $this->information = $this->user->information ?? '';
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
            'email' => 'required|email|max:255|unique:users,email,' . $this->userId,
        ], static::validationMessages(), static::validationAttributes());
    }

    public function updatedPassword($value)
    {
        if ($value) {
            $this->validateOnly('password', [
                'password' => 'nullable|string|min:8',
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

    // ─── Validação Completa + Atualização ───────────────────────

    public function update()
    {
        Gate::authorize('update', $this->user);

        $auth = auth()->user();
        if ($auth->hasRole('manager')) {
            // Manager apenas mantém clientes como clientes
            if ($this->user->hasRole('client')) {
                $this->role = 'client';
            }
        } elseif ($auth->hasRole('admin') && $this->role === 'super-admin') {
            abort(403, 'Administradores não podem promover usuários a super-administrador.');
        }

        $rules = [
            'name'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $this->userId,
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

        // Senha opcional no edit
        if ($this->password) {
            $rules['password'] = 'required|string|min:8';
            $rules['password_confirmation'] = 'required_with:password|same:password';
        }

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

        // Só atualiza a senha se foi informada
        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        // Upload do avatar como WebP
        if ($this->avatar) {
            if ($this->user->avatar) {
                \App\Services\Asset::delete($this->user->avatar);
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
        return view('livewire.dashboard.Users.edit')->layout('layouts.admin', ['title' => 'Editar Usuário']);
    }
}
