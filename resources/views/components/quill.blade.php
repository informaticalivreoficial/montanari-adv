@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => 'Digite o conteúdo aqui...',
    'required' => false,
    'disabled' => false,
    'toolbar' => 'default',
    'height' => '200',
    'class' => '',
])

{{--
  ═══════════════════════════════════════════════════════════
  Componente: x-quill (Rich Text Editor)
  ═══════════════════════════════════════════════════════════

  Editor de texto rico com Quill.js integrado ao Livewire.

  Props:
    name        → Nome do campo (obrigatório)
    label       → Label do campo
    value       → Valor inicial (HTML)
    placeholder → Texto placeholder
    required    → Campo obrigatório
    disabled    → Desabilitar edição
    toolbar     → 'default' | 'full' | 'minimal' | 'none'
    height      → Altura mínima em px (padrão: 200)
    class       → Classes CSS adicionais

  Uso:
    <x-quill name="content" label="Conteúdo" wire:model="content" />
    <x-quill name="bio" toolbar="minimal" height="120" wire:model="bio" />
--}}

@error($name)
    @php $hasError = true; @endphp
@else
    @php $hasError = false; @endphp
@enderror

<div class="space-y-1 {{ $class }}">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    {{-- Quill Editor --}}
    <div
        wire:ignore
        x-data
        x-init="$nextTick(() => {
            setTimeout(() => initQuill($refs.quillContainer, $wire, '{{ $name }}', {
                toolbar: '{{ $toolbar }}',
                placeholder: @js($placeholder),
                readOnly: {{ $disabled ? 'true' : 'false' }}
            }), 100);
        })"
        class="quill-editor-wrapper {{ $hasError ? 'has-error' : '' }}"
        style="--quill-height: {{ $height }}px"
    >
        <div
            x-ref="quillContainer"
            data-quill-editor="{{ $name }}"
            data-quill-toolbar="{{ $toolbar }}"
            class="quill-editor"
        ></div>
    </div>

    {{-- Hidden input para Livewire --}}
    <input type="hidden" wire:model="{{ $name }}" value="{{ $value }}" />

    @error($name)
        <p class="flex items-center gap-1 text-xs text-red-500">
            <i class="fa-solid fa-circle-exclamation"></i>
            {{ $message }}
        </p>
    @enderror
</div>

@once
    <style>
        .quill-editor-wrapper .ql-toolbar {
            border-radius: 0.5rem 0.5rem 0 0;
        }
        .quill-editor-wrapper .ql-container {
            border-top: none;
            border-radius: 0 0 0.5rem 0.5rem;
            font-family: inherit;
            min-height: var(--quill-height, 200px);
        }
        .quill-editor-wrapper .ql-editor {
            min-height: var(--quill-height, 200px);
            color: #111827;
        }
        .quill-editor-wrapper:focus-within .ql-toolbar,
        .quill-editor-wrapper:focus-within .ql-container {
            border-color: #f59e0b;
            box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.1);
        }
        .quill-editor-wrapper.has-error .ql-toolbar,
        .quill-editor-wrapper.has-error .ql-container {
            border-color: #ef4444;
        }
        .quill-editor-wrapper.has-error:focus-within .ql-toolbar,
        .quill-editor-wrapper.has-error:focus-within .ql-container {
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.1);
        }
        .quill-editor-wrapper.toolbar-none .ql-toolbar { display: none; }
        .quill-editor-wrapper.toolbar-none .ql-container { border-radius: 0.5rem; }
    </style>
@endonce
