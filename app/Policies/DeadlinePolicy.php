<?php

namespace App\Policies;

use App\Models\Deadline;
use App\Models\User;

class DeadlinePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'employee']);
    }

    public function update(User $user, Deadline $deadline): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'employee']);
    }

    public function delete(User $user, Deadline $deadline): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }
}
