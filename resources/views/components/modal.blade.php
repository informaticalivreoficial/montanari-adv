@props([
    'name',
    'title' => null,
    'subtitle' => null,
    'size' => 'md',
    'closeable' => true,
])

@php
    $sizeClasses = match($size) {
        'sm' => 'max-w-md',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-4xl',
        'full' => 'max-w-6xl',
        default => 'max-w-lg',
    };
@endphp

<div
    x-data="{ open: false }"
    x-on:open-modal.window="if($event.detail.name === '{{ $name }}') { open = true; document.body.classList.add('overflow-hidden'); }"
    x-on:close-modal.window="if($event.detail.name === '{{ $name }}') { open = false; document.body.classList.remove('overflow-hidden'); }"
    x-on:keydown.escape.window="if(open) { open = false; document.body.classList.remove('overflow-hidden'); }"
    x-show="open"
    x-cloak
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-title-{{ $name }}"
    role="dialog"
    aria-modal="true"
    x-init="$watch('open', value => { if(value) { document.body.classList.add('overflow-hidden'); } else { document.body.classList.remove('overflow-hidden'); } })"
>
    <!-- Backdrop -->
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-500/75 backdrop-blur-sm"
        x-on:click="{{ $closeable ? 'open = false; document.body.classList.remove(\'overflow-hidden\');' : '' }}"
    ></div>

    <!-- Modal -->
    <div class="flex min-h-full items-center justify-center p-4">
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="relative w-full {{ $sizeClasses }} transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all"
        >
            {{-- Header --}}
            @if($title || $subtitle)
                <div class="flex items-start justify-between border-b border-gray-100 px-6 py-4">
                    <div>
                        @if($title)
                            <h3 class="text-lg font-semibold text-gray-900" id="modal-title-{{ $name }}">{{ $title }}</h3>
                        @endif
                        @if($subtitle)
                            <p class="mt-1 text-sm text-gray-500">{{ $subtitle }}</p>
                        @endif
                    </div>
                    @if($closeable)
                        <button
                            type="button"
                            x-on:click="open = false; document.body.classList.remove('overflow-hidden');"
                            class="rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-500 transition"
                        >
                            <i class="fa-solid fa-times"></i>
                        </button>
                    @endif
                </div>
            @endif

            {{-- Body --}}
            <div class="px-6 py-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
