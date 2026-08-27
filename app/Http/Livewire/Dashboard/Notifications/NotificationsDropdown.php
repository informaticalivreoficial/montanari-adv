<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsDropdown extends Component
{
    public $isOpen = false;

    protected $listeners = [
        '$refresh' => 'loadData',
    ];

    public function loadData(): void
    {
        // Force re-render
    }

    public function toggle(): void
    {
        $this->isOpen = ! $this->isOpen;

        if ($this->isOpen) {
            // Marca as mais antigas como lidas ao abrir (as 5 mais recentes)
            auth()->user()
                ->unreadNotifications()
                ->latest()
                ->limit(5)
                ->get()
                ->markAsRead();
        }
    }

    public function close(): void
    {
        $this->isOpen = false;
    }

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

        return view('livewire.dashboard.notifications.notifications-dropdown', [
            'notifications' => $user->notifications()->latest()->take(8)->get(),
            'unreadCount'   => $user->unreadNotifications()->count(),
        ]);
    }
}
