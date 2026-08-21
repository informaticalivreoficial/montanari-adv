<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Traits\HasAlerts;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use HasAlerts;

    public $roles = [];
    public $permissions = [];
    public $roleName, $permissionName;
    public $editRoleMode = false;
    public $editPermissionMode = false;
    public $roleId;
    public $successMessage = '';
    public $errorMessage = '';

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function createRole()
    {
        $this->validate([
            'roleName' => 'required|string|max:255|unique:roles,name',
        ]);

        Role::create(['name' => $this->roleName]);

        $this->roleName = '';
        $this->roles = Role::all();
        $this->toastSuccess('Função criada com sucesso!');
    }

    public function updateRole()
    {
        $this->validate([
            'roleName' => 'sometimes|required|string|max:255',
        ]);

        $role = Role::findOrFail($this->roleId);
        $role->name = $this->roleName;
        $role->save();

        $this->editRoleMode = false;
        $this->roleName = '';
        $this->roles = Role::all();
        $this->toastSuccess('Função atualizada com sucesso!');
    }

    public function deleteRole($id)
    {
        Role::findOrFail($id)->delete();

        $this->roles = Role::all();
        $this->toastWarning('Função excluída!');
    }

    public function createPermission()
    {
        $this->validate([
            'permissionName' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => $this->permissionName, 'guard_name' => 'web']);

        $this->permissionName = '';
        $this->permissions = Permission::all();
        $this->toastSuccess('Permissão criada com sucesso!');
    }

    public function updatePermission()
    {
        $this->toastSuccess('Permissão atualizada!');
    }

    public function render()
    {
        return view('livewire.dashboard.permissions')->layout('layouts.admin', ['title' => 'Permissões']);
    }
}
