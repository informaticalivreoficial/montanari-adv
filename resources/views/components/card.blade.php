@props([
    'title' => null,
    'subtitle' => null,
    'icon' => null,
    'padding' => true,
    'shadow' => true,
])

{{--
  Componente: x-card
  Uso:
    <x-card title="Configurações" icon="fa-gear">
        <p>Conteúdo do card...</p>
    </x-card>

    <x-card padding="false">
        <table>...</table>
    </x-card>
--}}

<div class="rounded-xl bg-white {{ $shadow ? 'shadow-sm' : '' }} border border-gray-200" {{ $attributes }}>
    @if($title)
        <div class="flex items-center gap-3 border-b border-gray-100 px-6 py-4">
            @if($icon)
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                    <i class="fa-solid {{ $icon }} text-sm"></i>
                </div>
            @endif
            <div>
                <h3 class="text-base font-semibold text-gray-900">{{ $title }}</h3>
                @if($subtitle)
                    <p class="text-xs text-gray-500">{{ $subtitle }}</p>
                @endif
            </div>
        </div>
    @endif

    <div class="{{ $padding ? 'px-6 py-4' : '' }}">
        {{ $slot }}
    </div>
</div>
