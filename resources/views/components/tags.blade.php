@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => 'Digite e pressione Enter...',
    'required' => false,
    'disabled' => false,
    'maxTags' => 0,
    'color' => 'amber',
    'class' => '',
])

{{--
  ═══════════════════════════════════════════════════════════
  Componente: x-tags (Tag Input)
  ═══════════════════════════════════════════════════════════

  Campo de entrada de tags com suporte a múltiplos valores.

  Props:
    name        → Nome do campo (obrigatório)
    label       → Label do campo
    value       → Valor inicial (string separada por vírgulas ou array)
    placeholder → Texto placeholder
    required    → Campo obrigatório
    disabled    → Desabilitar edição
    maxTags     → Limite de tags (0 = ilimitado)
    color       → Cor do badge: amber | blue | green | red | purple | gray
    class       → Classes CSS adicionais

  Uso:
    <x-tags name="tags" label="Tags" wire:model="tags" />
    <x-tags name="keywords" label="Palavras-chave" color="blue" max-tags="10" wire:model="keywords" />
    <x-tags name="categories" label="Categorias" color="green" wire:model="categories" />

  Suporte a:
    - Enter / Tab para adicionar tag
    - Backspace para remover última tag
    - Tags duplicadas bloqueadas
    - Contador de tags (quando maxTags > 0)
    - Valores iniciais por vírgula ou array
--}}

@error($name)
    @php $hasError = true; @endphp
@else
    @php $hasError = false; @endphp
@enderror

@php
    // Parse do valor inicial
    $initialTags = [];
    if (!empty($value)) {
        $initialTags = is_array($value)
            ? $value
            : collect(explode(',', $value))->map(fn($t) => trim($t))->filter()->values()->toArray();
    }

    // Mapeamento de cores
    $colorMap = [
        'amber' => ['bg' => 'bg-amber-50', 'text' => 'text-amber-700', 'ring' => 'ring-amber-200', 'hover' => 'hover:bg-amber-200', 'icon' => 'text-amber-500', 'iconHover' => 'group-hover:text-amber-700'],
        'blue'  => ['bg' => 'bg-blue-50', 'text' => 'text-blue-700', 'ring' => 'ring-blue-200', 'hover' => 'hover:bg-blue-200', 'icon' => 'text-blue-500', 'iconHover' => 'group-hover:text-blue-700'],
        'green' => ['bg' => 'bg-emerald-50', 'text' => 'text-emerald-700', 'ring' => 'ring-emerald-200', 'hover' => 'hover:bg-emerald-200', 'icon' => 'text-emerald-500', 'iconHover' => 'group-hover:text-emerald-700'],
        'red'   => ['bg' => 'bg-red-50', 'text' => 'text-red-700', 'ring' => 'ring-red-200', 'hover' => 'hover:bg-red-200', 'icon' => 'text-red-500', 'iconHover' => 'group-hover:text-red-700'],
        'purple'=> ['bg' => 'bg-purple-50', 'text' => 'text-purple-700', 'ring' => 'ring-purple-200', 'hover' => 'hover:bg-purple-200', 'icon' => 'text-purple-500', 'iconHover' => 'group-hover:text-purple-700'],
        'gray'  => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'ring' => 'ring-gray-300', 'hover' => 'hover:bg-gray-200', 'icon' => 'text-gray-400', 'iconHover' => 'group-hover:text-gray-600'],
    ];
    $colors = $colorMap[$color] ?? $colorMap['amber'];
@endphp

<div
    x-data="tagsInput({{ json_encode($initialTags) }}, {{ $maxTags }})"
    x-init="$watch('tags', () => { $refs.hiddenInput.value = tags.join(','); $refs.hiddenInput.dispatchEvent(new Event('input')); })"
    class="space-y-1 {{ $class }}"
>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    {{-- Container principal --}}
    <div
        @click="!{{ $disabled ? 'true' : 'false' }} && $refs.tagInput.focus()"
        class="flex min-h-[42px] flex-wrap items-center gap-2 rounded-lg border bg-white px-3 py-2 shadow-sm transition
               focus-within:ring-2
               {{ $disabled ? 'cursor-not-allowed bg-gray-50 opacity-60' : 'cursor-text' }}
               {{ $hasError
                   ? 'border-red-500 focus-within:border-red-500 focus-within:ring-red-500/20'
                   : 'border-gray-300 focus-within:border-amber-500 focus-within:ring-amber-500/20' }}"
    >
        {{-- Tags existentes --}}
        <template x-for="(tag, index) in tags" :key="index">
            <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-sm font-medium ring-1 ring-inset {{ $colors['bg'] }} {{ $colors['text'] }} {{ $colors['ring'] }}">
                <span x-text="tag"></span>
                @unless($disabled)
                    <button
                        type="button"
                        @click="removeTag(index)"
                        class="group -mr-1 rounded-full p-0.5 transition {{ $colors['hover'] }}"
                    >
                        <svg class="h-3.5 w-3.5 {{ $colors['icon'] }} {{ $colors['iconHover'] }}" viewBox="0 0 12 12" fill="currentColor">
                            <path d="M3.5 3.5l5 5m0-5l-5 5" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                        </svg>
                    </button>
                @endunless
            </span>
        </template>

        {{-- Input --}}
        <input
            type="text"
            x-ref="tagInput"
            x-model="newTag"
            @keydown.enter.prevent="addTag()"
            @keydown.tab.prevent="addTag()"
            @keydown.backspace="newTag === '' && removeLastTag()"
            x-show="tags.length < maxTags || maxTags === 0"
            {{ $disabled ? 'disabled' : '' }}
            placeholder="{{ $placeholder }}"
            class="min-w-[120px] flex-1 bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none
                   disabled:cursor-not-allowed disabled:text-gray-400"
        />
    </div>

    {{-- Footer: Erros + Contador --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            @error($name)
                <p class="flex items-center gap-1 text-xs text-red-500">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>
        @if($maxTags > 0)
            <span class="text-xs text-gray-400">
                <span x-text="tags.length"></span>/<span x-text="maxTags"></span> tags
            </span>
        @else
            <span class="text-xs text-gray-400">
                <span x-text="tags.length"></span> tags
            </span>
        @endif
    </div>

    {{-- Hidden input para Livewire --}}
    <input
        type="hidden"
        x-ref="hiddenInput"
        name="{{ $name }}"
        value="{{ is_array($value) ? implode(',', $value) : $value }}"
        {{ $attributes }}
    />
</div>

@once
    <script>
        function tagsInput(initialTags = [], maxTags = 0) {
            return {
                tags: initialTags.filter(t => t && t.trim() !== ''),
                newTag: '',
                maxTags: maxTags,
                addTag() {
                    const tag = this.newTag.trim();
                    if (!tag) return;
                    if (this.tags.includes(tag)) {
                        window.MontanariToast?.show?.({ message: 'Tag já adicionada', type: 'warning' });
                        this.newTag = '';
                        return;
                    }
                    if (this.maxTags > 0 && this.tags.length >= this.maxTags) {
                        window.MontanariToast?.show?.({ message: `Máximo de ${this.maxTags} tags`, type: 'warning' });
                        this.newTag = '';
                        return;
                    }
                    this.tags.push(tag);
                    this.newTag = '';
                },
                removeTag(index) {
                    this.tags.splice(index, 1);
                },
                removeLastTag() {
                    if (this.tags.length > 0) {
                        this.tags.pop();
                    }
                }
            }
        }
    </script>
@endonce
