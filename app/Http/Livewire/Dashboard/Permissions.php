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
    public $permissionId;
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

    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $this->roleId = $id;
        $this->roleName = $role->name;
        $this->editRoleMode = true;
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

    public function cancelEditRole()
    {
        $this->editRoleMode = false;
        $this->roleName = '';
        $this->roleId = null;
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

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permissionId = $id;
        $this->permissionName = $permission->name;
        $this->editPermissionMode = true;
    }

    public function updatePermission()
    {
        $this->validate([
            'permissionName' => 'sometimes|required|string|max:255',
        ]);

        $permission = Permission::findOrFail($this->permissionId);
        $permission->name = $this->permissionName;
        $permission->save();

        $this->editPermissionMode = false;
        $this->permissionName = '';
        $this->permissions = Permission::all();
        $this->toastSuccess('Permissão atualizada com sucesso!');
    }

    public function cancelEditPermission()
    {
        $this->editPermissionMode = false;
        $this->permissionName = '';
        $this->permissionId = null;
    }

    public function deletePermission($id)
    {
        Permission::findOrFail($id)->delete();

        $this->permissions = Permission::all();
        $this->toastWarning('Permissão excluída!');
    }

    public function render()
    {
        return view('livewire.dashboard.permissions')->layout('layouts.admin', ['title' => 'Permissões']);
    }
}
