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
        if ($user->id === $model->id) return false;
        return $user->hasRole('super-admin');
    }
}
