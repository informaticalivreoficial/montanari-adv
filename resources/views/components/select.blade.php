@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => 'Selecione',
    'class' => '',
    'required' => false,
    'disabled' => false,
    'options' => [],
])

{{--
  Componente: x-select
  Uso:
    <x-select name="role" label="Função" :options="$roles" wire:model="role" required />
    <x-select name="gender" label="Gênero" :options="['M' => 'Masculino', 'F' => 'Feminino']" wire:model="gender" />
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

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ $disabled ? 'disabled' : '' }}
        class="w-full rounded-lg border bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition
               focus:outline-none focus:ring-2
               disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500
               {{ $hasError
                   ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20'
                   : 'border-gray-300 focus:border-amber-500 focus:ring-amber-500/20' }}
               {{ $class }}"
        {{ $attributes }}
    >
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" {{ old($name, $value) == $key ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="flex items-center gap-1 text-xs text-red-500">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ $message }}
        </p>
    @enderror
</div>
