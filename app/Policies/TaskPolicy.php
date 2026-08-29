<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['super-admin', 'admin', 'manager']);
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function update(User $user, Task $task): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function delete(User $user, Task $task): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }
}
