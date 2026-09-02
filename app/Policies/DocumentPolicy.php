<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;

class DocumentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee']);
    }

    public function view(User $user, Document $document): bool
    {
        if ($user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) return true;
        return $user->id === ($document->process->client_id ?? null);
    }

    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'manager', 'employee', 'client']);
    }

    public function update(User $user, Document $document): bool
    {
        return $user->hasRole(['super-admin', 'admin']);
    }

    public function delete(User $user, Document $document): bool
    {
        if ($user->hasRole(['super-admin', 'admin'])) return true;
        return $user->id === $document->uploaded_by;
    }
}
