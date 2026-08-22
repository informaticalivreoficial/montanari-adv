@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => 'Digite e pressione Enter...',
    'required' => false,
    'class' => '',
])

{{--
  Componente: x-forms.tags
  Uso:
    <x-forms.tags name="metatags" label="Metatags" wire:model="metatags" />
    <x-forms.tags name="tags" label="Tags" wire:model="tags" placeholder="Adicionar tag..." />
--}}

@php
    $initialTags = is_array($value) ? $value : (collect(explode(',', $value))->map(fn($t) => trim($t))->filter()->values()->toArray());
@endphp

<div
    x-data="tagsInput({{ json_encode($initialTags) }})"
    x-init="$watch('tags', () => { $refs.hiddenInput.value = tags.join(','); $refs.hiddenInput.dispatchEvent(new Event('input')); })"
    class="space-y-1"
>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <div
        @click="$refs.tagInput.focus()"
        class="flex min-h-[42px] flex-wrap items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm transition
               focus-within:border-amber-500 focus-within:ring-2 focus-within:ring-amber-500/20
               {{ $class }}"
    >
        {{-- Tags existentes --}}
        <template x-for="(tag, index) in tags" :key="index">
            <span class="inline-flex items-center gap-1.5 rounded-full bg-amber-50 px-3 py-1 text-sm font-medium text-amber-700 ring-1 ring-inset ring-amber-200">
                <span x-text="tag"></span>
                <button
                    type="button"
                    @click="removeTag(index)"
                    class="group -mr-1 rounded-full p-0.5 transition hover:bg-amber-200"
                >
                    <svg class="h-3.5 w-3.5 text-amber-500 group-hover:text-amber-700" viewBox="0 0 12 12" fill="currentColor">
                        <path d="M3.5 3.5l5 5m0-5l-5 5" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"/>
                    </svg>
                </button>
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
            placeholder="{{ $placeholder }}"
            class="min-w-[120px] flex-1 bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
        />
    </div>

    {{-- Contador --}}
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            @error($name)
                <p class="flex items-center gap-1 text-xs text-red-500">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    {{ $message }}
                </p>
            @enderror
        </div>
        <span class="text-xs text-gray-400" x-show="maxTags > 0">
            <span x-text="tags.length"></span>/<span x-text="maxTags"></span> tags
        </span>
    </div>

    {{-- Hidden input para Livewire --}}
    <input
        type="hidden"
        x-ref="hiddenInput"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $attributes }}
    />
</div>

@once
    <script>
        function tagsInput(initialTags = []) {
            return {
                tags: initialTags.filter(t => t && t.trim() !== ''),
                newTag: '',
                maxTags: 0, // 0 = ilimitado
                addTag() {
                    const tag = this.newTag.trim();
                    if (tag && !this.tags.includes(tag)) {
                        this.tags.push(tag);
                    }
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
