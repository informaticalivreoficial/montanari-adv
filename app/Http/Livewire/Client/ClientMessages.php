<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Process;

class ClientMessages extends Component
{
    public $chatMessages = [];
    public $unreadCount = 0;

    // New message form
    public $showNewMessage = false;
    public $selectedProcess = '';
    public $newSubject = '';
    public $newBody = '';
    public $processes = [];

    protected $rules = [
        'newSubject' => 'required|string|min:3|max:255',
        'newBody' => 'required|string|min:10|max:5000',
        'selectedProcess' => 'nullable|exists:processes,id',
    ];

    protected $messages = [
        'newSubject.required' => 'Informe o assunto.',
        'newSubject.min' => 'O assunto deve ter pelo menos 3 caracteres.',
        'newBody.required' => 'Escreva sua mensagem.',
        'newBody.min' => 'A mensagem deve ter pelo menos 10 caracteres.',
    ];

    public function mount()
    {
        $userId = Auth::id();

        $this->processes = Process::where('client_id', $userId)->get();

        $this->loadMessages();
    }

    protected function loadMessages()
    {
        $userId = Auth::id();

        $this->chatMessages = Message::where('sender_id', $userId)
            ->orWhere('recipient_id', $userId)
            ->with(['sender', 'recipient', 'process'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        $this->unreadCount = Message::where('recipient_id', $userId)
            ->where('is_read', false)
            ->count();
    }

    public function toggleNewMessage()
    {
        $this->showNewMessage = !$this->showNewMessage;
    }

    public function sendMessage()
    {
        $this->validate();

        Message::create([
            'sender_id' => Auth::id(),
            'recipient_id' => null, // Will be assigned by admin
            'process_id' => $this->selectedProcess ?: null,
            'subject' => $this->newSubject,
            'body' => $this->newBody,
        ]);

        $this->reset(['newSubject', 'newBody', 'selectedProcess']);
        $this->showNewMessage = false;
        $this->loadMessages();

        session()->flash('success', 'Mensagem enviada com sucesso!');
    }

    public function markAsRead($messageId)
    {
        $userId = Auth::id();

        $message = Message::where('id', $messageId)
            ->where('recipient_id', $userId)
            ->first();

        if ($message && !$message->is_read) {
            $message->markAsRead();
            $this->loadMessages();
        }
    }

    public function render()
    {
        return view('livewire.client.client-messages')->layout('layouts.client', ['title' => 'Mensagens']);
    }
}
