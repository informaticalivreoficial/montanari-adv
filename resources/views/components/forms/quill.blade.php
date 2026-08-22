@props([
    'name',
    'label' => null,
    'value' => '',
    'placeholder' => 'Digite o conteúdo aqui...',
    'required' => false,
    'rows' => 5,
    'class' => '',
])

{{--
  Componente: x-forms.quill
  Uso:
    <x-forms.quill name="privacy_policy" label="Política de Privacidade" wire:model="privacy_policy" />
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

    {{-- Quill Editor --}}
    <div
        wire:ignore
        x-data
        x-init="$nextTick(() => initQuill($refs.quillContainer, $wire, '{{ $name }}'))"
        class="quill-editor-wrapper"
    >
        <div
            x-ref="quillContainer"
            data-quill-editor="{{ $name }}"
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
            border-color: #d1d5db;
            border-radius: 0.5rem 0.5rem 0 0;
            background-color: #f9fafb;
        }
        .quill-editor-wrapper .ql-container {
            border-color: #d1d5db;
            border-top: none;
            border-radius: 0 0 0.5rem 0.5rem;
            font-family: inherit;
            font-size: 0.875rem;
            min-height: 120px;
        }
        .quill-editor-wrapper .ql-editor {
            min-height: 120px;
            padding: 0.75rem 1rem;
            color: #111827;
        }
        .quill-editor-wrapper .ql-editor.ql-blank::before {
            color: #9ca3af;
            font-style: normal;
        }
        .quill-editor-wrapper:focus-within .ql-toolbar,
        .quill-editor-wrapper:focus-within .ql-container {
            border-color: #f59e0b;
            box-shadow: 0 0 0 2px rgba(245, 158, 11, 0.1);
        }
        /* Botões do toolbar */
        .quill-editor-wrapper .ql-stroke {
            stroke: #6b7280;
        }
        .quill-editor-wrapper .ql-fill {
            fill: #6b7280;
        }
        .quill-editor-wrapper .ql-picker-label {
            color: #6b7280;
        }
        .quill-editor-wrapper .ql-active .ql-stroke {
            stroke: #f59e0b;
        }
        .quill-editor-wrapper .ql-active .ql-fill {
            fill: #f59e0b;
        }
        .quill-editor-wrapper .ql-active {
            color: #f59e0b;
        }
    </style>
@endonce
