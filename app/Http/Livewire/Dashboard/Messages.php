<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Models\Message;
use App\Models\User;
use App\Models\Process;
use App\Notifications\System\MessageReceived;

class Messages extends Component
{
    public $threads = [];
    public $selectedClientId = null;
    public $conversation = [];
    public $replyBody = '';
    public $team = [];
    public $assignedTo = '';

    public function mount()
    {
        $this->team = User::role(['super-admin', 'admin', 'manager'])
            ->orderBy('name')
            ->get(['id', 'name'])
            ->toArray();

        $this->loadThreads();
    }

    public function loadThreads()
    {
        $messages = Message::with(['sender', 'recipient', 'process'])
            ->where(function ($q) {
                $q->whereNull('recipient_id')
                  ->orWhereHas('sender', fn($q2) => $q2->role('client'))
                  ->orWhereHas('recipient', fn($q2) => $q2->role('client'));
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $grouped = [];

        foreach ($messages as $m) {
            $isClientSender = $m->sender && $m->sender->isClient();
            $clientId = $isClientSender ? $m->sender_id : $m->recipient_id;

            if (!$clientId) {
                continue;
            }

            if (!isset($grouped[$clientId])) {
                $client = $isClientSender ? $m->sender : $m->recipient;
                $grouped[$clientId] = [
                    'client_id'     => $clientId,
                    'client_name'   => $client?->name ?? 'Cliente',
                    'client_avatar' => $client?->avatar ?? null,
                    'last_body'     => $m->body,
                    'last_at'       => $m->created_at,
                    'unread'        => 0,
                    'assigned_to'   => null,
                    'process_id'    => $m->process_id,
                ];
            }

            // Não lidas: destinatárias ao escritório (null = não atribuída, ou equipe)
            if (!$m->is_read && ($m->recipient_id === null || ($m->recipient && $m->recipient->isTeam()))) {
                $grouped[$clientId]['unread']++;
            }

            // Advogado atribuído (destinatário da equipe)
            if ($m->recipient && $m->recipient->isTeam()) {
                $grouped[$clientId]['assigned_to'] = $m->recipient->name;
            }

            // Mantém a mais recente
            if ($m->created_at->gt($grouped[$clientId]['last_at'])) {
                $grouped[$clientId]['last_body']   = $m->body;
                $grouped[$clientId]['last_at']     = $m->created_at;
                $grouped[$clientId]['process_id']  = $m->process_id;
            }
        }

        // Ordena por não lidas primeiro, depois mais recente
        $threads = array_values($grouped);
        usort($threads, fn($a, $b) => $b['unread'] <=> $a['unread'] ?: $b['last_at'] <=> $a['last_at']);

        $this->threads = $threads;
    }

    public function openThread($clientId)
    {
        $this->selectedClientId = $clientId;
        $this->loadConversation($clientId);
        $this->markThreadRead($clientId);
        $this->dispatch('conversation-updated');

        // Define o advogado atribuído atual no dropdown
        $first = collect($this->conversation)->first();
        $this->assignedTo = ($first && !empty($first['recipient']) && ($first['recipient']['id'] ?? null)) ? $first['recipient']['id'] : '';

        $this->loadThreads();
    }

    protected function loadConversation($clientId)
    {
        $this->conversation = Message::with(['sender', 'recipient', 'process'])
            ->where(function ($q) use ($clientId) {
                $q->where('sender_id', $clientId)
                  ->where('recipient_id', '!=', $clientId)
                  ->orWhere('recipient_id', $clientId);
            })
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();
    }

    protected function markThreadRead($clientId)
    {
        Message::where('sender_id', $clientId)
            ->where('is_read', false)
            ->where(function ($q) {
                $q->whereNull('recipient_id')
                  ->orWhereHas('recipient', fn($q2) => $q2->role(['super-admin', 'admin', 'manager']));
            })
            ->update(['is_read' => true, 'read_at' => now()]);
    }

    public function reply()
    {
        $this->validate(
            ['replyBody' => 'required|string|min:10|max:5000'],
            [
                'replyBody.required' => 'Escreva sua resposta.',
                'replyBody.min' => 'A resposta deve ter pelo menos 10 caracteres.',
            ]
        );

        $clientId = $this->selectedClientId;
        if (!$clientId) {
            return;
        }

        $processId = collect($this->conversation)->first()['process_id'] ?? null;

        $message = Message::create([
            'sender_id'   => Auth::id(),
            'recipient_id' => $clientId,
            'process_id'  => $processId ?: null,
            'subject'     => null,
            'body'        => $this->replyBody,
        ]);

        // Notifica o cliente (sininho na área do cliente)
        if ($client = User::find($clientId)) {
            $client->notify(new \App\Notifications\System\OfficeReplied(
                preview: $this->replyBody,
                messageId: $message->id,
            ));
        }

        $this->replyBody = '';
        $this->loadConversation($clientId);
        $this->loadThreads();
        $this->dispatch('conversation-updated');

        session()->flash('success', 'Resposta enviada com sucesso!');
    }

    public function updatedAssignedTo($value)
    {
        $this->assignTo($value ?: null);
    }

    public function assignTo($userId)
    {
        if (!$this->selectedClientId) {
            return;
        }

        Message::where(function ($q) {
            $q->where('sender_id', $this->selectedClientId)
              ->orWhere('recipient_id', $this->selectedClientId);
        })
        ->where(function ($q) {
            $q->whereNull('recipient_id')
              ->orWhereHas('recipient', fn($q2) => $q2->role(['super-admin', 'admin', 'manager']));
        })
        ->update(['recipient_id' => $userId]);

        $this->loadThreads();
        $this->loadConversation($this->selectedClientId);

        session()->flash('success', $userId ? 'Mensagem atribuída.' : 'Mensagem desatribuída.');
    }

    /** Atualiza lista e conversa periodicamente (wire:poll). */
    public function poll()
    {
        $this->loadThreads();

        if ($this->selectedClientId) {
            $this->loadConversation($this->selectedClientId);
            $this->dispatch('conversation-updated');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.messages')->layout('layouts.admin', ['title' => 'Mensagens']);
    }
}
