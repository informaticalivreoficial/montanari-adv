<?php

namespace App\Http\Livewire\Dashboard\Users;

use Livewire\Component;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;

class Users extends Component
{
    use HasAlerts, HasValidations;

    // Propriedades de controle
    public $viewMode = 'all'; // 'all', 'clients', 'team'
    public $search = '';
    public $confirmDeleteId = null;

    // Propriedades de exibição
    public $successMessage = '';
    public $errorMessage = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 20;

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
        Gate::authorize('viewAny', User::class);

        // Managers só operam na visão de clientes
        if (auth()->user()->hasRole('manager')) {
            $this->viewMode = 'clients';
        }

        $this->loadUsers();
        $this->loadStats();
    }

    public function loadStats()
    {
        $authUser = auth()->user();

        // Managers não enxergam a equipe interna
        if ($authUser->hasRole('manager')) {
            $clientCount = User::role('client')->count();
            $clientActive = User::role('client')->where('status', 1)->count();

            $this->stats = [
                'total' => $clientCount + 1, // clientes + o próprio manager
                'clients' => $clientCount,
                'team' => 0,
                'active' => $clientActive + ($authUser->status ? 1 : 0),
                'inactive' => ($clientCount - $clientActive) + ($authUser->status ? 0 : 1),
            ];

            return;
        }

        if ($authUser->hasRole('admin')) {
            // Admin não enxerga super-admin em nenhuma contagem
            $this->stats = [
                'total' => User::whereDoesntHave('roles', fn($q) => $q->where('name', 'super-admin'))->count(),
                'clients' => User::role('client')->count(),
                'team' => User::role(['admin', 'manager', 'employee'])->count(),
                'active' => User::where('status', 1)
                    ->whereDoesntHave('roles', fn($q) => $q->where('name', 'super-admin'))->count(),
                'inactive' => User::where('status', 0)
                    ->whereDoesntHave('roles', fn($q) => $q->where('name', 'super-admin'))->count(),
            ];
        } else {
            $this->stats = [
                'total' => User::count(),
                'clients' => User::role('client')->count(),
                'team' => User::role(['super-admin', 'admin', 'manager', 'employee'])->count(),
                'active' => User::where('status', 1)->count(),
                'inactive' => User::where('status', 0)->count(),
            ];
        }
    }

    public function loadUsers()
    {
        $authUser = auth()->user();
        $query = User::with('roles');

        // Managers apenas visualizam a si mesmos e os clientes
        if ($authUser->hasRole('manager')) {
            $query->where(function ($q) use ($authUser) {
                $q->role('client')->orWhere('id', $authUser->id);
            });
        } else {
            // Aplicar filtro de visualização
            if ($this->viewMode === 'clients') {
                $query->role('client');
            } elseif ($this->viewMode === 'team') {
                $query->role(['super-admin', 'admin', 'manager', 'employee']);
            }

            // Admin não visualiza super-admin
            if ($authUser->hasRole('admin')) {
                $query->whereDoesntHave('roles', function ($q) {
                    $q->where('name', 'super-admin');
                });
            }
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
                'url_avatar' => $user->url_avatar,
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
            $user = User::findOrFail($this->confirmDeleteId);

            // Proteção: aplica a UserPolicy (impede excluir o último super-admin / a si mesmo sem outro super-admin)
            if (!\Illuminate\Support\Facades\Gate::allows('delete', $user)) {
                $this->confirmDeleteId = null;
                $this->dispatch('close-modal', name: 'delete-confirm-modal');
                $this->toastError('Operação não permitida: não é possível excluir este usuário (ele é o único super-admin ativo ou a regra de exclusão não autoriza).');
                return;
            }

            $user->delete();
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
