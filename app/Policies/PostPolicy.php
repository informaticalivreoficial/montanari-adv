<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function viewAny(User $user): bool
    {
        // Employee não acessa módulo de conteúdos
        if ($user->hasRole('employee')) {
            return false;
        }

        return $user->hasAnyRole(['super-admin', 'admin', 'manager']);
    }

    public function create(User $user): bool
    {
        if ($user->hasRole('employee')) {
            return false;
        }

        return $user->hasRole(['super-admin', 'admin']);
    }

    public function update(User $user, Post $post): bool
    {
        if ($user->hasRole('employee')) {
            return false;
        }

        return $user->hasRole(['super-admin', 'admin']);
    }

    public function delete(User $user, Post $post): bool
    {
        if ($user->hasRole('employee')) {
            return false;
        }

        return $user->hasRole(['super-admin', 'admin']);
    }
}
