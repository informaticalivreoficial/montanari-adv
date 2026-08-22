<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Profile extends Component
{
    use WithFileUploads;

    public $user;

    // Edit profile
    public $name = '';
    public $email = '';
    public $phone = '';
    public $cell_phone = '';
    public $whatsapp = '';
    public $position = '';
    public $department = '';
    public $biography = '';
    public $avatar = null;

    // Change password
    public $current_password = '';
    public $new_password = '';
    public $new_password_confirmation = '';

    // Feedback
    public $successMessage = '';
    public $errorMessage = '';

    public function mount()
    {
        $this->loadUser();
    }

    protected function loadUser()
    {
        $this->user = Auth::user()->load('roles', 'permissions');
        $this->name = $this->user->name ?? '';
        $this->email = $this->user->email ?? '';
        $this->phone = $this->user->phone ?? '';
        $this->cell_phone = $this->user->cell_phone ?? '';
        $this->whatsapp = $this->user->whatsapp ?? '';
        $this->position = $this->user->position ?? '';
        $this->department = $this->user->department ?? '';
        $this->biography = $this->user->biography ?? '';
    }

    public function openEditModal()
    {
        $this->resetValidation();
        $this->dispatch('open-modal', name: 'edit-profile-modal');
    }

    public function closeEditModal()
    {
        $this->resetValidation();
        $this->reset(['avatar']);
        $this->loadUser();
    }

    public function openPasswordModal()
    {
        $this->resetValidation();
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->dispatch('open-modal', name: 'password-modal');
    }

    public function closePasswordModal()
    {
        $this->resetValidation();
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'phone' => 'nullable|string|max:20',
            'cell_phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'biography' => 'nullable|string|max:2000',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone ?: null,
            'cell_phone' => $this->cell_phone ?: null,
            'whatsapp' => $this->whatsapp ?: null,
            'position' => $this->position ?: null,
            'department' => $this->department ?: null,
            'biography' => $this->biography ?: null,
        ];

        // Upload avatar
        if ($this->avatar) {
            // Delete old avatar
            if ($this->user->avatar && Storage::disk('public')->exists($this->user->avatar)) {
                Storage::disk('public')->delete($this->user->avatar);
            }
            $data['avatar'] = $this->convertToWebp($this->avatar, 'avatars');
        }

        $this->user->update($data);

        $this->loadUser();
        $this->reset(['avatar']);

        $this->successMessage = 'Perfil atualizado com sucesso!';
        $this->dispatch('close-modal', name: 'edit-profile-modal');

        // Auto-dismiss
        $this->dispatch('toast', message: 'Perfil atualizado com sucesso!', type: 'success');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!Hash::check($this->current_password, $this->user->password)) {
            $this->addError('current_password', 'A senha atual está incorreta.');
            return;
        }

        $this->user->update([
            'password' => bcrypt($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        $this->successMessage = 'Senha alterada com sucesso!';
        $this->dispatch('close-modal', name: 'password-modal');

        $this->dispatch('toast', message: 'Senha alterada com sucesso!', type: 'success');
    }

    protected function convertToWebp($file, string $folder): string
    {
        $filename = uniqid() . '.webp';
        $path = storage_path("app/public/{$folder}");

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        $fullPath = "{$path}/{$filename}";

        $image = Image::make($file->getRealPath());
        $image->encode('webp', 85);
        $image->save($fullPath);

        return "{$folder}/{$filename}";
    }

    public function render()
    {
        return view('livewire.dashboard.Users.profile')->layout('layouts.admin', ['title' => 'Meu Perfil']);
    }
}
