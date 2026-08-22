<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\User;
use App\Traits\HasAlerts;

class Users extends Component
{
    use HasAlerts;

    // Propriedades de controle
    public $viewMode = 'all'; // 'all', 'clients', 'team'
    public $search = '';
    public $confirmDeleteId = null;

    // Propriedades de exibição
    public $successMessage = '';
    public $errorMessage = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    // Dados
    public $users = [];
    public $stats = [];

    // Pagination
    public $currentPage = 1;
    public $lastPage = 1;
    public $total = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'viewMode' => ['except' => 'all'],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'currentPage' => ['except' => 1],
    ];

    public function mount()
    {
        $this->loadUsers();
        $this->loadStats();
    }

    public function loadStats()
    {
        $this->stats = [
            'total' => User::count(),
            'clients' => User::role('client')->count(),
            'team' => User::role(['super-admin', 'admin', 'manager'])->count(),
            'active' => User::where('status', 1)->count(),
            'inactive' => User::where('status', 0)->count(),
        ];
    }

    public function loadUsers()
    {
        $query = User::with('roles');

        // Aplicar filtro de visualização
        if ($this->viewMode === 'clients') {
            $query->role('client');
        } elseif ($this->viewMode === 'team') {
            $query->role(['super-admin', 'admin', 'manager']);
        }

        // Aplicar busca
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('position', 'like', "%{$this->search}%")
                  ->orWhere('department', 'like', "%{$this->search}%");
            });
        }

        // Contar total antes da paginação
        $this->total = $query->count();

        // Calcular última página
        $this->lastPage = max(1, ceil($this->total / $this->perPage));

        // Garantir que currentPage é válido
        if ($this->currentPage > $this->lastPage) {
            $this->currentPage = $this->lastPage;
        }

        // Aplicar ordenação e paginação
        $paginated = $query->orderBy($this->sortBy, $this->sortDirection)
                           ->skip(($this->currentPage - 1) * $this->perPage)
                           ->take($this->perPage)
                           ->get();

        // Converter para array simples
        $this->users = $paginated->map(function ($user) {
            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'position' => $user->position ?? '',
                'department' => $user->department ?? '',
                'status' => $user->status ?? 0,
                'role' => $user->roles->first()?->name ?? '',
                'created_at' => $user->created_at?->format('d/m/Y') ?? '',
            ];
        })->toArray();
    }

    public function goToPage($page)
    {
        $this->currentPage = $page;
        $this->loadUsers();
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
            $this->loadUsers();
        }
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            $this->currentPage++;
            $this->loadUsers();
        }
    }

    public function updatedSearch()
    {
        $this->currentPage = 1;
        $this->loadUsers();
    }

    public function updatedViewMode()
    {
        $this->currentPage = 1;
        $this->loadUsers();
        $this->loadStats();
    }

    public function switchMode($mode)
    {
        $this->viewMode = $mode;
        $this->currentPage = 1;
        $this->loadUsers();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
        $this->loadUsers();
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status ? 0 : 1;
        $user->save();

        $this->loadUsers();
        $this->loadStats();

        $status = $user->status ? 'ativado' : 'desativado';
        $this->toastSuccess("Usuário {$status} com sucesso!");
    }

    public function confirmDelete($id)
    {
        $this->confirmDeleteId = $id;
        $this->dispatch('open-modal', name: 'delete-confirm-modal');
    }

    public function executeDelete()
    {
        if ($this->confirmDeleteId) {
            User::findOrFail($this->confirmDeleteId)->delete();
            $this->confirmDeleteId = null;
            $this->loadUsers();
            $this->loadStats();
            $this->toastWarning('Usuário excluído com sucesso!');
        }
    }

    public function cancelDelete()
    {
        $this->confirmDeleteId = null;
    }

    public function render()
    {
        return view('livewire.dashboard.Users.users')->layout('layouts.admin', ['title' => 'Usuários']);
    }
}
