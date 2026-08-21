@props([
    'size' => 'md',
    'color' => 'amber',
    'label' => null,
])

{{--
  Componente: x-spinner
  Uso:
    <x-spinner />
    <x-spinner size="sm" label="Carregando..." />
    <x-spinner size="lg" color="blue" />
--}}

@php
    $sizeClasses = match($size) {
        'sm' => 'h-4 w-4',
        'lg' => 'h-8 w-8',
        default => 'h-5 w-5',
    };

    $colorClasses = match($color) {
        'red' => 'border-red-500',
        'green' => 'border-green-500',
        'blue' => 'border-blue-500',
        'white' => 'border-white',
        default => 'border-amber-500',
    };
@endphp

<div class="inline-flex items-center gap-2" {{ $attributes }}>
    <svg class="animate-spin {{ $sizeClasses }} {{ $colorClasses }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    @if($label)
        <span class="text-sm text-gray-600">{{ $label }}</span>
    @endif
</div>
