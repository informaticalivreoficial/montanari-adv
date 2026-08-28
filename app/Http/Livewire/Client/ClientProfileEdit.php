<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\HasAlerts;

class ClientProfileEdit extends Component
{
    use WithFileUploads, HasAlerts;

    public $user;

    // Basic
    public $name = '';
    public $email = '';
    public $additional_email = '';

    // Personal
    public $gender = '';
    public $cpf = '';
    public $rg = '';
    public $rg_expedition = '';
    public $birthday = '';
    public $naturalness = '';
    public $civil_status = '';

    // Contact
    public $phone = '';
    public $cell_phone = '';
    public $whatsapp = '';
    public $telegram = '';

    // Address
    public $zipcode = '';
    public $street = '';
    public $number = '';
    public $complement = '';
    public $neighborhood = '';
    public $state = '';
    public $city = '';

    // Social
    public $facebook = '';
    public $twitter = '';
    public $instagram = '';
    public $linkedin = '';

    // Avatar
    public $avatar = null;
    public $avatarPreview = null;

    public function mount()
    {
        $this->user = Auth::user();
        $this->fillFields();
    }

    protected function fillFields()
    {
        $this->name              = $this->user->name ?? '';
        $this->email             = $this->user->email ?? '';
        $this->additional_email  = $this->user->additional_email ?? '';
        $this->gender            = $this->user->gender ?? '';
        $this->cpf               = $this->user->cpf ?? '';
        $this->rg                = $this->user->rg ?? '';
        $this->rg_expedition     = $this->user->rg_expedition ?? '';
        $this->birthday          = $this->user->birthday ?? '';
        $this->naturalness       = $this->user->naturalness ?? '';
        $this->civil_status      = $this->user->civil_status ?? '';
        $this->phone             = $this->user->phone ?? '';
        $this->cell_phone        = $this->user->cell_phone ?? '';
        $this->whatsapp          = $this->user->whatsapp ?? '';
        $this->telegram          = $this->user->telegram ?? '';
        $this->zipcode           = $this->user->zipcode ?? '';
        $this->street            = $this->user->street ?? '';
        $this->number            = $this->user->number ?? '';
        $this->complement        = $this->user->complement ?? '';
        $this->neighborhood      = $this->user->neighborhood ?? '';
        $this->state             = $this->user->state ?? '';
        $this->city              = $this->user->city ?? '';
        $this->facebook          = $this->user->facebook ?? '';
        $this->twitter           = $this->user->twitter ?? '';
        $this->instagram         = $this->user->instagram ?? '';
        $this->linkedin          = $this->user->linkedin ?? '';
    }

    public function updatedAvatar()
    {
        if ($this->avatar) {
            $this->avatarPreview = $this->avatar->temporaryUrl();
        }
    }

    public function removeAvatarPreview()
    {
        $this->reset(['avatar', 'avatarPreview']);
    }

    public function updatedZipcode($value)
    {
        $zip = preg_replace('/\D/', '', $value);

        if (strlen($zip) !== 8) {
            return;
        }

        try {
            $response = \Http::timeout(5)->get("https://viacep.com.br/ws/{$zip}/json/");

            if ($response->successful()) {
                $data = $response->json();

                if (!isset($data['erro'])) {
                    $this->street       = $data['logradouro'] ?? '';
                    $this->neighborhood = $data['bairro'] ?? '';
                    $this->city         = $data['localidade'] ?? '';
                    $this->state        = $data['uf'] ?? '';
                }
            }
        } catch (\Exception $e) {
            // Silently ignore
        }
    }

    public function updateProfile()
    {
        $this->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'additional_email'  => 'nullable|email|max:255',
            'gender'            => 'nullable|in:male,female,other',
            'cpf'               => 'nullable|string|max:14',
            'rg'                => 'nullable|string|max:20',
            'rg_expedition'     => 'nullable|string|max:50',
            'birthday'          => 'nullable|date',
            'naturalness'       => 'nullable|string|max:255',
            'civil_status'      => 'nullable|in:single,married,divorced,widowed,stable_union',
            'phone'             => 'nullable|string|max:20',
            'cell_phone'        => 'nullable|string|max:20',
            'whatsapp'          => 'nullable|string|max:20',
            'telegram'          => 'nullable|string|max:255',
            'zipcode'           => 'nullable|string|max:10',
            'street'            => 'nullable|string|max:255',
            'number'            => 'nullable|string|max:20',
            'complement'        => 'nullable|string|max:255',
            'neighborhood'      => 'nullable|string|max:255',
            'state'             => 'nullable|string|max:2',
            'city'              => 'nullable|string|max:255',
            'facebook'          => 'nullable|url|max:255',
            'twitter'           => 'nullable|url|max:255',
            'instagram'         => 'nullable|url|max:255',
            'linkedin'          => 'nullable|url|max:255',
            'avatar'            => 'nullable|image|max:2048',
        ]);

        $data = [
            'name'              => $this->name,
            'email'             => $this->email,
            'additional_email'  => $this->additional_email ?: null,
            'gender'            => $this->gender ?: null,
            'cpf'               => $this->cpf ?: null,
            'rg'                => $this->rg ?: null,
            'rg_expedition'     => $this->rg_expedition ?: null,
            'birthday'          => $this->birthday ?: null,
            'naturalness'       => $this->naturalness ?: null,
            'civil_status'      => $this->civil_status ?: null,
            'phone'             => $this->phone ?: null,
            'cell_phone'        => $this->cell_phone ?: null,
            'whatsapp'          => $this->whatsapp ?: null,
            'telegram'          => $this->telegram ?: null,
            'zipcode'           => $this->zipcode ?: null,
            'street'            => $this->street ?: null,
            'number'            => $this->number ?: null,
            'complement'        => $this->complement ?: null,
            'neighborhood'      => $this->neighborhood ?: null,
            'state'             => $this->state ?: null,
            'city'              => $this->city ?: null,
            'facebook'          => $this->facebook ?: null,
            'twitter'           => $this->twitter ?: null,
            'instagram'         => $this->instagram ?: null,
            'linkedin'          => $this->linkedin ?: null,
        ];

        if ($this->avatar) {
            if ($this->user->avatar) {
                \App\Services\Asset::delete($this->user->avatar);
            }
            $data['avatar'] = $this->convertToWebp($this->avatar, 'avatars');
        }

        $this->user->update($data);
        $this->user->refresh();

        // Limpa o upload temporário do avatar (permanece na página de edição)
        if ($this->avatar) {
            $this->reset(['avatar', 'avatarPreview']);
        }

        $this->toastSuccess('Perfil atualizado com sucesso!');
    }

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
        return view('livewire.client.client-profile-edit')->layout('layouts.client', ['title' => 'Editar Perfil']);
    }
}
