@props([
    'label' => 'Confirmar',
    'color' => 'amber',
    'size' => 'md',
    'icon' => null,
    'confirmTitle' => null,
    'confirmText' => null,
    'confirmMethod' => null,
    'confirmParams' => [],
    'confirmBtnText' => 'Sim, confirmar',
    'cancelBtnText' => 'Cancelar',
    'type' => 'submit',
    'disabled' => false,
])

{{--
  Componente: x-confirm-button
  Uso:
    <x-confirm-button label="Excluir" color="red" icon="fa-trash"
        confirm-title="Excluir registro?"
        confirm-text="Esta ação não pode ser desfeita."
        wire:click="delete({{ $user->id }})" />

    <x-confirm-button label="Salvar" icon="fa-check" type="submit" />
--}}

@php
    $colorClasses = match($color) {
        'red' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500 text-white',
        'green' => 'bg-green-600 hover:bg-green-700 focus:ring-green-500 text-white',
        'blue' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-white',
        'gray' => 'bg-gray-600 hover:bg-gray-700 focus:ring-gray-500 text-white',
        default => 'bg-amber-600 hover:bg-amber-700 focus:ring-amber-500 text-white',
    };

    $sizeClasses = match($size) {
        'sm' => 'px-3 py-1.5 text-xs',
        'lg' => 'px-6 py-3 text-base',
        default => 'px-4 py-2.5 text-sm',
    };
@endphp

@if($confirmTitle)
    <button
        type="{{ $type }}"
        {{ $disabled ? 'disabled' : '' }}
        class="inline-flex items-center justify-center gap-2 rounded-lg font-semibold shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 {{ $colorClasses }} {{ $sizeClasses }}"
        onclick="event.preventDefault();
            MontanariAlert.confirm({
                title: '{{ $confirmTitle }}',
                text: '{{ $confirmText }}',
                confirmButtonText: '{{ $confirmBtnText }}',
                cancelButtonText: '{{ $cancelBtnText }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', {{ json_encode($confirmParams) }})
                }
            });"
    >
        @if($icon)
            <i class="fa-solid {{ $icon }} @if($size === 'sm') text-xs @endif"></i>
        @endif
        {{ $label }}
    </button>
@else
    <button
        type="{{ $type }}"
        {{ $disabled ? 'disabled' : '' }}
        class="inline-flex items-center justify-center gap-2 rounded-lg font-semibold shadow-sm transition focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 {{ $colorClasses }} {{ $sizeClasses }}"
        {{ $attributes }}
    >
        @if($icon)
            <i class="fa-solid {{ $icon }} @if($size === 'sm') text-xs @endif"></i>
        @endif
        {{ $label }}
    </button>
@endif
