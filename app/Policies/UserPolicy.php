<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['super-admin', 'admin', 'manager']);
    }

    public function view(User $user, User $model): bool
    {
        if ($user->id === $model->id) return true;
        return $user->hasRole(['super-admin', 'admin', 'manager']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function update(User $user, User $model): bool
    {
        if ($user->id === $model->id) return true;
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function delete(User $user, User $model): bool
    {
        // Apenas super-admin e admin podem excluir usuários
        if (!$user->hasRole(['super-admin', 'admin'])) {
            return false;
        }

        // Excluir um super-admin:
        if ($model->hasRole('super-admin')) {
            // Só um super-admin pode excluir um super-admin
            if (!$user->hasRole('super-admin')) {
                return false;
            }
            // Nunca remover o ÚLTIMO super-admin (vale para auto-exclusão também):
            // um super-admin só pode ser excluído se restar ao menos 1 super-admin ativo.
            $remaining = User::role('super-admin')->where('id', '!=', $model->id)->count();
            return $remaining > 0;
        }

        // Auto-exclusão:
        if ($user->id === $model->id) {
            // Super-admin só pode excluir a própria conta se houver OUTRO super-admin
            if ($user->hasRole('super-admin')) {
                return User::role('super-admin')->where('id', '!=', $user->id)->count() > 0;
            }
            // Admin não pode se auto-excluir
            return false;
        }

        // Super-admin ou admin excluindo outro usuário comum
        return true;
    }
}
