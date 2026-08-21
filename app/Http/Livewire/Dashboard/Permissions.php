<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
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
        
        $this->successMessage = 'Função criada com sucesso!';
        $this->roleName = '';
        
        $this->dispatchBrowserEvent('role-created');
    }

    public function updateRole()
    {
        $this->validate([
            'roleName' => 'sometimes|required|string|max:255',
        ]);

        $role = Role::findOrFail($this->roleId);
        $role->name = $this->roleName;
        $role->save();

        $this->successMessage = 'Função atualizada com sucesso!';
        $this->editRoleMode = false;
        $this->roleName = '';
    }

    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        
        $this->errorMessage = 'Função excluída com sucesso!';
        $this->dispatchBrowserEvent('role-deleted');
    }

    public function createPermission()
    {
        $this->validate([
            'permissionName' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => $this->permissionName, 'guard_name' => 'web']);
        
        $this->successMessage = 'Permissão criada com sucesso!';
        $this->permissionName = '';
        
        $this->dispatchBrowserEvent('permission-created');
    }

    public function updatePermission()
    {
        // Implementation could be added here
        $this->successMessage = 'Permissão atualizada!';
    }

    public function render()
    {
        return view('livewire.dashboard.permissions')->layout('layouts.admin', ['title' => 'Permissões']);
    }
}
