<?php

namespace App\Policies;

use App\Models\Process;
use App\Models\User;

class ProcessPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function view(User $user, Process $process): bool
    {
        if ($user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) return true;
        return $user->id === $process->client_id;
    }

    public function create(User $user): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function update(User $user, Process $process): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function delete(User $user, Process $process): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function resync(User $user, Process $process): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }
}
