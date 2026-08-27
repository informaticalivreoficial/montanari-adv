<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use Livewire\Component;
use Livewire\WithPagination;

class ListNotifications extends Component
{
    use WithPagination;

    public $filter = 'all'; // all, unread, read

    protected $listeners = [
        '$refresh' => '$refresh',
    ];

    public function markAsRead(string $id): void
    {
        auth()->user()
            ->notifications()
            ->where('id', $id)
            ->first()?->markAsRead();
    }

    public function markAllAsRead(): void
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function delete(string $id): void
    {
        auth()->user()
            ->notifications()
            ->where('id', $id)
            ->first()?->delete();
    }

    public function render()
    {
        $user = auth()->user();
        $query = $user->notifications()->latest();

        if ($this->filter === 'unread') {
            $query->unread();
        } elseif ($this->filter === 'read') {
            $query->whereNotNull('read_at');
        }

        $notifications = $query->paginate(15);

        return view('livewire.dashboard.notifications.list', [
            'notifications' => $notifications,
            'unreadCount'   => $user->unreadNotifications()->count(),
        ])->layout('layouts.admin', ['title' => 'Notificações']);
    }
}
