<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'employee']);
    }

    public function update(User $user, Task $task): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'employee']);
    }

    public function delete(User $user, Task $task): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }
}
