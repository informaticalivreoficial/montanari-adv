<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use App\Models\Message;
use App\Models\Process;
use App\Models\User;
use App\Notifications\System\MessageReceived;

class ClientMessages extends Component
{
    public $conversation = [];
    public $unreadCount = 0;
    public $replyBody = '';

    // New message form
    public $showNewMessage = false;
    public $selectedProcess = '';
    public $newSubject = '';
    public $newBody = '';
    public $processes = [];

    protected $rules = [
        'newSubject' => 'required|string|min:3|max:255',
        'newBody'    => 'required|string|min:10|max:5000',
        'selectedProcess' => 'nullable|exists:processes,id',
    ];

    protected $messages = [
        'newSubject.required' => 'Informe o assunto.',
        'newSubject.min'      => 'O assunto deve ter pelo menos 3 caracteres.',
        'newBody.required'    => 'Escreva sua mensagem.',
        'newBody.min'         => 'A mensagem deve ter pelo menos 10 caracteres.',
    ];

    public function mount()
    {
        $userId = Auth::id();

        $this->processes = Process::where('client_id', $userId)->get();

        $this->loadConversation();
    }

    protected function loadConversation()
    {
        $userId = Auth::id();

        // Marca as mensagens recebidas (do escritório) como lidas ao abrir
        Message::where('recipient_id', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true, 'read_at' => now()]);

        $this->conversation = Message::where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)
                  ->where('recipient_id', '!=', $userId)
                  ->orWhere('recipient_id', $userId);
            })
            ->with(['sender', 'recipient', 'process'])
            ->orderBy('created_at', 'asc')
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

    /** Atualiza a conversa periodicamente (wire:poll). */
    public function pollConversation()
    {
        $this->loadConversation();
        $this->dispatch('conversation-updated');
    }

    public function reply()
    {
        $this->validate(
            ['replyBody' => 'required|string|min:10|max:5000'],
            [
                'replyBody.required' => 'Escreva sua mensagem.',
                'replyBody.min'      => 'A mensagem deve ter pelo menos 10 caracteres.',
            ]
        );

        $userId = Auth::id();
        $processId = collect($this->conversation)->first()['process_id'] ?? null;

        $responsible = $this->resolveResponsible($userId, $processId);

        Message::create([
            'sender_id'    => $userId,
            'recipient_id' => $responsible?->id, // mantém atribuição ao advogado
            'process_id'   => $processId ?: null,
            'subject'      => null,
            'body'         => $this->replyBody,
        ]);

        $this->notifyOffice(User::find($userId), 'Resposta do cliente', $this->replyBody, $processId);

        $this->replyBody = '';
        $this->loadConversation();
        $this->dispatch('conversation-updated');

        session()->flash('success', 'Mensagem enviada com sucesso!');
    }

    public function sendMessage()
    {
        $this->validate();

        $client = Auth::user();

        $responsible = $this->resolveResponsible($client->id, $this->selectedProcess ?: null);

        Message::create([
            'sender_id'    => $client->id,
            'recipient_id' => $responsible?->id,
            'process_id'   => $this->selectedProcess ?: null,
            'subject'      => $this->newSubject,
            'body'         => $this->newBody,
        ]);

        $this->notifyOffice($client, $this->newSubject, $this->newBody, $this->selectedProcess ?: null);

        $this->reset(['newSubject', 'newBody', 'selectedProcess']);
        $this->showNewMessage = false;
        $this->loadConversation();
        $this->dispatch('conversation-updated');

        session()->flash('success', 'Mensagem enviada com sucesso!');
    }

    protected function resolveResponsible($clientId, $processId)
    {
        $responsible = null;

        if ($processId) {
            $responsible = Process::find($processId)?->responsible;
        }

        if (!$responsible) {
            $responsible = Process::where('client_id', $clientId)
                ->whereNotNull('responsible_id')
                ->with('responsible')
                ->first()?->responsible;
        }

        return $responsible;
    }

    protected function notifyOffice(User $client, string $subject, string $body, $processId = null)
    {
        // Advogado responsável + admin + super-admin
        $responsible = $this->resolveResponsible($client->id, $processId);

        $recipients = collect();
        if ($responsible) {
            $recipients->push($responsible);
        }
        $recipients = $recipients
            ->merge(User::role(['super-admin', 'admin'])->get())
            ->unique('id');

        if ($recipients->isNotEmpty()) {
            Notification::send($recipients, new MessageReceived(
                clientName: $client->name,
                subject:    $subject,
                preview:    $body,
            ));
        }

        // Telegram (chat do escritório) — texto puro (compatível)
        try {
            $telegram = new \App\Services\TelegramService();
            $telegram->sendMessage(
                "📨 Nova mensagem do cliente\n" .
                "👤 Cliente: {$client->name}\n" .
                "📋 Assunto: {$subject}\n" .
                "💬 " . Str::limit($body, 400) . "\n" .
                "⏰ " . now()->format('d/m/Y H:i')
            );
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('Falha ao enviar mensagem ao Telegram', [
                'erro' => $e->getMessage(),
            ]);
        }
    }

    public function markAsRead($messageId)
    {
        $userId = Auth::id();

        $message = Message::where('id', $messageId)
            ->where('recipient_id', $userId)
            ->first();

        if ($message && !$message->is_read) {
            $message->markAsRead();
            $this->loadConversation();
            $this->dispatch('conversation-updated');
        }
    }

    public function render()
    {
        return view('livewire.client.client-messages')->layout('layouts.client', ['title' => 'Mensagens']);
    }
}
