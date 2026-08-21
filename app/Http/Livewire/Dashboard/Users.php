<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Traits\HasAlerts;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Users extends Component
{
    use HasAlerts;

    public $name, $email, $password, $role, $permissions = [];
    public $editMode = false;
    public $userId;
    public $successMessage = '';
    public $errorMessage = '';

    protected $listeners = ['deleteUser' => 'delete'];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        $this->users = User::with('roles')->get();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,name',
            'permissions' => 'array',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $user->assignRole($this->role);

        if (!empty($this->permissions)) {
            $user->givePermissionTo($this->permissions);
        }

        $this->reset(['name', 'email', 'password', 'role', 'permissions']);
        $this->users = User::with('roles')->get();
        $this->toastSuccess('Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->roles->first()?->name ?? '';
        $this->permissions = $user->permissions->pluck('name')->toArray();
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $this->userId,
            'password' => 'sometimes|required|string|min:8|confirmed',
            'role' => 'sometimes|required|exists:roles,name',
            'permissions' => 'array',
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name ?: $user->name,
            'email' => $this->email ?: $user->email,
        ]);

        // Atualizar roles
        $user->syncRoles([$this->role]);

        // Atualizar permissões
        $user->permissions()->sync($this->permissions ?? []);

        $this->users = User::with('roles')->get();
        $this->editMode = false;
        $this->toastSuccess('Usuário atualizado com sucesso!');
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $this->users = User::with('roles')->get();
        $this->toastWarning('Usuário excluído com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.users')->layout('layouts.admin', ['title' => 'Usuários']);
    }
}
