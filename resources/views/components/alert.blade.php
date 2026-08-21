@props([
    'type' => 'info',
    'dismissible' => true,
    'title' => null,
    'icon' => null,
])

{{--
  Componente: x-alert
  Uso:
    <x-alert type="success" title="Salvo!" />
    <x-alert type="error">Erro ao salvar o registro.</x-alert>
    <x-alert type="warning" title="Atenção" dismissible>
        <p>Tem certeza que deseja continuar?</p>
    </x-alert>
--}}

@php
    $config = match($type) {
        'success' => [
            'bg' => 'bg-green-50 border-green-200',
            'text' => 'text-green-800',
            'icon' => $icon ?? 'fa-check-circle',
            'iconColor' => 'text-green-500',
        ],
        'error' => [
            'bg' => 'bg-red-50 border-red-200',
            'text' => 'text-red-800',
            'icon' => $icon ?? 'fa-exclamation-circle',
            'iconColor' => 'text-red-500',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50 border-yellow-200',
            'text' => 'text-yellow-800',
            'icon' => $icon ?? 'fa-exclamation-triangle',
            'iconColor' => 'text-yellow-500',
        ],
        'info' => [
            'bg' => 'bg-blue-50 border-blue-200',
            'text' => 'text-blue-800',
            'icon' => $icon ?? 'fa-info-circle',
            'iconColor' => 'text-blue-500',
        ],
        default => [
            'bg' => 'bg-gray-50 border-gray-200',
            'text' => 'text-gray-800',
            'icon' => $icon ?? 'fa-info-circle',
            'iconColor' => 'text-gray-500',
        ],
    };
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    class="flex items-start gap-3 rounded-lg border p-4 {{ $config['bg'] }}"
    role="alert"
>
    <i class="fa-solid {{ $config['icon'] }} mt-0.5 {{ $config['iconColor'] }}"></i>

    <div class="flex-1 {{ $config['text'] }}">
        @if($title)
            <p class="font-semibold">{{ $title }}</p>
        @endif
        @if($slot->isNotEmpty())
            <p class="@if($title) mt-1 text-sm opacity-80 @endif">{{ $slot }}</p>
        @endif
    </div>

    @if($dismissible)
        <button
            type="button"
            @click="show = false"
            class="flex-shrink-0 {{ $config['text'] }} opacity-50 hover:opacity-100 transition"
        >
            <i class="fa-solid fa-times"></i>
        </button>
    @endif
</div>
