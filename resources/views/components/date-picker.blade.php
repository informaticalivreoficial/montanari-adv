@props([
    'name',
    'label' => null,
    'value' => '',
    'dateFormat' => 'd/m/Y',
    'enableTime' => false,
    'time24hr' => false,
    'mode' => 'single',
    'minDate' => null,
    'maxDate' => null,
    'noCalendar' => false,
    'altInput' => false,
    'placeholder' => 'Selecione...',
    'class' => '',
    'required' => false,
    'disabled' => false,
])

{{--
  Componente: x-date-picker
  Uso:
    <x-date-picker name="data" label="Data" wire:model.live="data" />
    <x-date-picker name="hora" label="Hora" enable-time time24hr wire:model.live="hora" />
    <x-date-picker name="periodo" mode="range" wire:model.live="periodo" />
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

    <div class="relative">
        <input
            type="text"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            data-flatpickr
            data-date-format="{{ $dateFormat }}"
            data-enable-time="{{ $enableTime ? 'true' : 'false' }}"
            data-time-24hr="{{ $time24hr ? 'true' : 'false' }}"
            data-mode="{{ $mode }}"
            data-min-date="{{ $minDate }}"
            data-max-date="{{ $maxDate }}"
            data-no-calendar="{{ $noCalendar ? 'true' : 'false' }}"
            data-alt-input="{{ $altInput ? 'true' : 'false' }}"
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-10 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                   focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20
                   disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500
                   {{ $class }}"
            {{ $attributes }}
        />
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
            <i class="fa-regular fa-calendar text-gray-400"></i>
        </div>
    </div>

    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
