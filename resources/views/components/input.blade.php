@props([
    'name',
    'label' => null,
    'value' => '',
    'type' => 'text',
    'placeholder' => '',
    'class' => '',
    'required' => false,
    'disabled' => false,
])

{{--
  Componente: x-input
  Uso:
    <x-input name="nome" label="Nome" wire:model="nome" />
    <x-input name="email" label="E-mail" type="email" wire:model="email" />
--}}

@error($name)
    @php $hasError = true; @endphp
@else
    @php $hasError = false; @endphp
@enderror

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
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="w-full rounded-lg border bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
               focus:outline-none focus:ring-2
               disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500
               {{ $hasError 
                   ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' 
                   : 'border-gray-300 focus:border-amber-500 focus:ring-amber-500/20' }}
               {{ $class }}"
        {{ $attributes }}
    />

    @error($name)
        <p class="flex items-center gap-1 text-xs text-red-500">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ $message }}
        </p>
    @enderror
</div>
