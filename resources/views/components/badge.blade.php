@props([
    'type' => 'info',
    'size' => 'sm',
    'dot' => false,
])

{{--
  Componente: x-badge
  Uso:
    <x-badge type="success">Ativo</x-badge>
    <x-badge type="error" dot />  {{-- badge com dot --}}
    <x-badge type="warning" size="lg">Pendente</x-badge>
--}}

@php
    $config = match($type) {
        'success' => 'bg-green-100 text-green-800',
        'error' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'info' => 'bg-blue-100 text-blue-800',
        'gray' => 'bg-gray-100 text-gray-600',
        'amber' => 'bg-amber-100 text-amber-800',
        default => 'bg-gray-100 text-gray-600',
    };

    $sizeClasses = match($size) {
        'lg' => 'px-3 py-1 text-sm',
        default => 'px-2 py-0.5 text-xs',
    };

    $dotColors = match($type) {
        'success' => 'bg-green-500',
        'error' => 'bg-red-500',
        'warning' => 'bg-yellow-500',
        'info' => 'bg-blue-500',
        'gray' => 'bg-gray-500',
        'amber' => 'bg-amber-500',
        default => 'bg-gray-500',
    };
@endphp

<span class="inline-flex items-center gap-1.5 rounded-full font-medium {{ $config }} {{ $sizeClasses }}" {{ $attributes }}>
    @if($dot)
        <span class="h-1.5 w-1.5 rounded-full {{ $dotColors }}"></span>
    @endif
    {{ $slot }}
</span>
