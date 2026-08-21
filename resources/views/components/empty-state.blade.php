@props([
    'icon' => 'fa-inbox',
    'title' => 'Nenhum registro encontrado',
    'description' => null,
    'actionLabel' => null,
    'actionRoute' => null,
    'actionClick' => null,
])

{{--
  Componente: x-empty-state
  Uso:
    <x-empty-state />
    <x-empty-state title="Sem usuários" description="Crie o primeiro usuário." icon="fa-users" action-label="Novo Usuário" action-route="dashboard.users.create" />
    <x-empty-state action-label="Adicionar" action-click="$dispatch('open-modal', { name: 'create' })" />
--}}

<div class="flex flex-col items-center justify-center py-16 px-4 text-center">
    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 text-gray-400 mb-4">
        <i class="fa-solid {{ $icon }} text-2xl"></i>
    </div>

    <h3 class="text-base font-semibold text-gray-900">{{ $title }}</h3>

    @if($description)
        <p class="mt-1 max-w-sm text-sm text-gray-500">{{ $description }}</p>
    @endif

    @if($actionLabel)
        <div class="mt-6">
            @if($actionRoute)
                <a href="{{ route($actionRoute) }}" class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    {{ $actionLabel }}
                </a>
            @elseif($actionClick)
                <button type="button" {{ $actionClick }} class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                    <i class="fa-solid fa-plus text-xs"></i>
                    {{ $actionLabel }}
                </button>
            @endif
        </div>
    @endif
</div>
