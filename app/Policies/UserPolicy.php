<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        // Employee não visualiza lista de usuários
        if ($user->hasRole('employee')) {
            return false;
        }

        return $user->hasAnyRole(['super-admin', 'admin', 'manager']);
    }

    public function view(User $user, User $model): bool
    {
        // Todos podem visualizar a própria conta
        if ($user->id === $model->id) {
            return true;
        }

        // Employee não visualiza outros usuários
        if ($user->hasRole('employee')) {
            return false;
        }

        // Cliente não visualiza ninguém além de si
        if ($user->hasRole('client')) {
            return false;
        }

        // Manager apenas visualiza clientes
        if ($user->hasRole('manager')) {
            return $model->hasRole('client');
        }

        // Admin visualiza todos, exceto super-admin
        if ($user->hasRole('admin')) {
            return !$model->hasRole('super-admin');
        }

        // Super-admin visualiza todos
        return $user->hasRole('super-admin');
    }

    public function create(User $user): bool
    {
        // Employee não cria usuários
        if ($user->hasRole('employee')) {
            return false;
        }

        // Super-admin e admin podem criar (admin não cria super-admin — validado no componente).
        // Manager cria apenas clientes (validado no componente).
        return $user->hasAnyRole(['super-admin', 'admin', 'manager']);
    }

    public function update(User $user, User $model): bool
    {
        // Própria conta: sempre permitido
        if ($user->id === $model->id) {
            return true;
        }

        // Employee não edita outros usuários
        if ($user->hasRole('employee')) {
            return false;
        }

        if ($user->hasRole('client')) {
            return false;
        }

        // Manager edita apenas clientes
        if ($user->hasRole('manager')) {
            return $model->hasRole('client');
        }

        // Admin edita todos, exceto super-admin
        if ($user->hasRole('admin')) {
            return !$model->hasRole('super-admin');
        }

        // Super-admin edita todos
        return $user->hasRole('super-admin');
    }

    public function delete(User $user, User $model): bool
    {
        // Manager, client e employee não excluem ninguém
        if ($user->hasRole(['manager', 'client', 'employee'])) {
            return false;
        }

        // Admin não exclui super-admin nem a si mesmo
        if ($user->hasRole('admin')) {
            if ($model->hasRole('super-admin')) {
                return false;
            }
            if ($model->id === $user->id) {
                return false;
            }
            return true;
        }

        // Super-admin: nunca remover o último super-admin
        if ($model->hasRole('super-admin')) {
            $remaining = User::role('super-admin')->where('id', '!=', $model->id)->count();
            if ($remaining === 0) {
                return false;
            }
        }

        // Super-admin não se auto-exclui se for o último
        if ($user->id === $model->id) {
            return User::role('super-admin')->where('id', '!=', $user->id)->count() > 0;
        }

        return $user->hasRole('super-admin');
    }
}
