@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => '',
    'rows' => 3,
    'class' => '',
    'required' => false,
    'disabled' => false,
])

{{--
  Componente: x-textarea
  Uso:
    <x-textarea name="biography" label="Biografia" rows="3" wire:model="biography" />
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

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition resize-none
               focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20
               disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500
               {{ $class }}"
        {{ $attributes }}
    ></textarea>

    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
