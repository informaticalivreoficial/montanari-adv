<?php

namespace App\Http\Livewire\Dashboard\Clients;

use Livewire\Component;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;

class ListClients extends Component
{
    use HasAlerts, HasValidations;

    public $search = '';
    public $confirmDeleteId = null;

    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 20;

    public $clients = [];
    public $stats = [];

    public $currentPage = 1;
    public $lastPage = 1;
    public $total = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'currentPage' => ['except' => 1],
    ];

    public function mount()
    {
        // Employee pode visualizar clientes
        if (!auth()->user()->hasAnyRole(['super-admin', 'admin', 'manager', 'employee'])) {
            abort(403, 'Acesso não autorizado.');
        }

        $this->loadClients();
        $this->loadStats();
    }

    public function loadStats()
    {
        $authUser = auth()->user();

        if ($authUser->hasRole('manager')) {
            $clientCount = User::role('client')->count();
            $clientActive = User::role('client')->where('status', 1)->count();

            $this->stats = [
                'total'   => $clientCount,
                'active'  => $clientActive,
                'inactive' => $clientCount - $clientActive,
            ];

            return;
        }

        $this->stats = [
            'total'   => User::role('client')->count(),
            'active'  => User::role('client')->where('status', 1)->count(),
            'inactive' => User::role('client')->where('status', 0)->count(),
        ];
    }

    public function loadClients()
    {
        $authUser = auth()->user();
        $query = User::with('roles')->role('client');

        // Manager só vê clientes
        // Admin/super-admin veem todos os clientes

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('cpf', 'like', "%{$this->search}%")
                  ->orWhere('phone', 'like', "%{$this->search}%")
                  ->orWhere('cell_phone', 'like', "%{$this->search}%");
            });
        }

        $this->total = $query->count();
        $this->lastPage = max(1, ceil($this->total / $this->perPage));

        if ($this->currentPage > $this->lastPage) {
            $this->currentPage = $this->lastPage;
        }

        $paginated = $query->orderBy($this->sortBy, $this->sortDirection)
                           ->skip(($this->currentPage - 1) * $this->perPage)
                           ->take($this->perPage)
                           ->get();

        $this->clients = $paginated->map(function ($client) {
            return [
                'id'         => $client->id,
                'name'       => $client->name,
                'email'      => $client->email,
                'url_avatar' => $client->url_avatar,
                'cpf'        => $client->cpf ?? '',
                'phone'      => $client->phone ?? '',
                'cell_phone' => $client->cell_phone ?? '',
                'status'     => $client->status ?? 0,
                'documents_count' => $client->clientDocuments()->count(),
                'processes_count' => $client->processes()->count(),
                'created_at' => $client->created_at?->format('d/m/Y') ?? '',
            ];
        })->toArray();
    }

    public function goToPage($page)
    {
        $this->currentPage = $page;
        $this->loadClients();
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->loadClients();
        }
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            $this->currentPage++;
            $this->loadClients();
        }
    }

    public function updatedSearch()
    {
        $this->currentPage = 1;
        $this->loadClients();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->loadClients();
    }

    public function toggleStatus($id)
    {
        $client = User::findOrFail($id);
        $client->status = $client->status ? 0 : 1;
        $client->save();

        $this->loadClients();
        $this->loadStats();

        $status = $client->status ? 'ativado' : 'desativado';
        $this->toastSuccess("Cliente {$status} com sucesso!");
    }

    public function confirmDelete($id)
    {
        $this->swalConfirm(
            title: 'Excluir cliente?',
            text: 'Tem certeza que deseja excluir este cliente? Todos os seus documentos e dados serão removidos.',
            method: 'executeDelete',
            params: [$id],
            confirmBtn: 'Sim, excluir',
            cancelBtn: 'Cancelar',
        );
    }

    public function executeDelete($id)
    {
        $client = User::findOrFail($id);

        // Proteção via policy
        if (!\Illuminate\Support\Facades\Gate::allows('delete', $client)) {
            $this->toastError('Operação não permitida.');
            return;
        }

        $client->delete();
        $this->loadClients();
        $this->loadStats();
        $this->toastWarning('Cliente excluído com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.Clients.list-clients')
            ->layout('layouts.admin', ['title' => 'Clientes']);
    }
}
