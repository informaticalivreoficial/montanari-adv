<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;

class EventPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function update(User $user, Event $event): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function delete(User $user, Event $event): bool
    {
        return $user->hasRole(['super-admin', 'admin', 'manager']);
    }
}
