@props([
    'name',
    'label' => null,
    'value' => '',
    'mask' => null,
    'maskType' => null,
    'placeholder' => '',
    'class' => '',
    'required' => false,
    'disabled' => false,
    'unmasked' => true,
])

{{--
  Componente: x-input-mask
  Uso:
    <x-input-mask name="cpf" label="CPF" mask-type="cpf" wire:model.live="cpf" />
    <x-input-mask name="phone" label="Telefone" mask-type="phone" wire:model.live="phone" />
    <x-input-mask name="cep" label="CEP" mask-type="cep" wire:model.live="cep" />
    <x-input-mask name="custom" mask="000.000" wire:model.live="custom" />
    <x-input-mask name="valor" mask-type="decimal" wire:model.live="valor" />
--}}

<div class="space-y-1">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="text"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        @if($maskType)
            data-mask-type="{{ $maskType }}"
            data-imask="1"
        @elseif($mask)
            data-imask="{{ $mask }}"
        @endif
        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
               focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20
               disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500
               {{ $class }}"
        {{ $attributes }}
    />

    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
