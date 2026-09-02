<?php

namespace App\Http\Livewire\Dashboard\Clients;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\Document;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class EditClient extends Component
{
    use HasAlerts, HasValidations, WithFileUploads;

    public $clientId;
    public $client = null;
    public $activeTab = 'data';

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

    // Observações
    public $information = '';

    public function mount($id)
    {
        $this->clientId = $id;
        $this->loadClient();

        // Todos os roles do admin podem editar clientes (exceto client)
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) {
            abort(403, 'Acesso não autorizado.');
        }
    }

    public function loadClient()
    {
        $this->client = User::with('roles', 'permissions')->findOrFail($this->clientId);

        $this->name = $this->client->name ?? '';
        $this->email = $this->client->email ?? '';
        $this->gender = $this->client->gender ?? '';
        $this->cpf = $this->client->cpf ?? '';
        $this->rg = $this->client->rg ?? '';
        $this->rg_expedition = $this->client->rg_expedition ?? '';
        $this->birthday = $this->client->birthday ?? '';
        $this->naturalness = $this->client->naturalness ?? '';
        $this->civil_status = $this->client->civil_status ?? '';
        $this->currentAvatar = $this->client->url_avatar ?? '';
        $this->zipcode = $this->client->zipcode ?? '';
        $this->street = $this->client->street ?? '';
        $this->number = $this->client->number ?? '';
        $this->complement = $this->client->complement ?? '';
        $this->neighborhood = $this->client->neighborhood ?? '';
        $this->state = $this->client->state ?? '';
        $this->city = $this->client->city ?? '';
        $this->phone = $this->client->phone ?? '';
        $this->cell_phone = $this->client->cell_phone ?? '';
        $this->whatsapp = $this->client->whatsapp ?? '';
        $this->telegram = $this->client->telegram ?? '';
        $this->additional_email = $this->client->additional_email ?? '';
        $this->information = $this->client->information ?? '';
    }

    // ─── Tabs ──────────────────────────────────────────────────

    public function setTab($tab)
    {
        $this->activeTab = $tab;
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
            'email' => 'required|email|max:255|unique:users,email,' . $this->clientId,
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

    // ─── Validação Completa + Atualização ───────────────────────

    public function update()
    {
        $rules = [
            'name'     => 'required|string|min:3|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $this->clientId,
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
        ];

        // Upload do avatar como WebP
        if ($this->avatar) {
            if ($this->client->avatar) {
                \App\Services\Asset::delete($this->client->avatar);
            }
            $data['avatar'] = $this->convertToWebp($this->avatar, 'avatars');
        }

        $this->client->update($data);

        return redirect()->route('dashboard.clients.edit', $this->clientId)
            ->with('toast_success', 'Cliente atualizado com sucesso!');
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
        $documents = $this->client
            ? $this->client->clientDocuments()->with('uploader')->latest()->get()
            : collect();

        return view('livewire.dashboard.Clients.edit-client', compact('documents'))
            ->layout('layouts.admin', ['title' => 'Editar Cliente']);
    }
}
