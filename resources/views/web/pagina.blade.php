@extends('web.master.master')

@section('content')

{{-- Breadcrumb Hero --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0 pattern-dots opacity-5"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="gold-line"></div>
            </div>
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-white mb-4">{{ $pagina->title }}</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">{{ $pagina->title }}</span>
            </nav>
        </div>
    </div>
</section>

{{-- Conteúdo --}}
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg prose-gray max-w-none
                    prose-headings:font-heading prose-headings:text-navy-800
                    prose-p:text-gray-600 prose-p:leading-relaxed
                    prose-a:text-gold-600 prose-a:no-underline hover:prose-a:underline
                    prose-img:rounded-xl prose-img:shadow-lg">

            {!! $pagina->content !!}
        </div>

        {{-- Galeria de Imagens --}}
        @if($pagina->images->count() > 0)
            <div class="mt-16" x-data="{ lightbox: false, currentSrc: '', currentIdx: 0, images: {{ $pagina->images->sortBy('order')->map(fn($img) => ['src' => \App\Services\Asset::url($img->path), 'caption' => $img->thumb_caption ?? ''])->values()->toJson() }} }">
                <div class="flex items-center gap-3 mb-8">
                    <div class="gold-line"></div>
                    <h2 class="font-heading text-2xl font-bold text-navy-800">Galeria</h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($pagina->images->sortBy('order') as $idx => $img)
                        <button
                            @click="currentIdx = {{ $idx }}; currentSrc = images[{{ $idx }}].src; lightbox = true"
                            class="group relative aspect-[4/3] rounded-xl overflow-hidden bg-gray-100 cursor-pointer"
                        >
                            <img
                                src="{{ \App\Services\Asset::url($img->path) }}"
                                alt="{{ $img->thumb_caption ?? $pagina->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                loading="lazy"
                            >
                            <div class="absolute inset-0 bg-navy-900/0 group-hover:bg-navy-900/30 transition-colors duration-300 flex items-center justify-center">
                                <i class="fas fa-expand text-white text-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                            </div>
                        </button>
                    @endforeach
                </div>

                {{-- Lightbox --}}
                <div
                    x-show="lightbox"
                    x-cloak
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm p-4"
                    @click.self="lightbox = false"
                    @keydown.escape.window="lightbox = false"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    {{-- Close --}}
                    <button @click="lightbox = false" class="absolute top-4 right-4 z-10 h-10 w-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition">
                        <i class="fas fa-xmark text-lg"></i>
                    </button>

                    {{-- Prev --}}
                    <button
                        @click="currentIdx = currentIdx > 0 ? currentIdx - 1 : images.length - 1; currentSrc = images[currentIdx].src;"
                        class="absolute left-4 z-10 h-10 w-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition"
                    >
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    {{-- Next --}}
                    <button
                        @click="currentIdx = currentIdx < images.length - 1 ? currentIdx + 1 : 0; currentSrc = images[currentIdx].src;"
                        class="absolute right-4 z-10 h-10 w-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition"
                    >
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    {{-- Image --}}
                    <div class="relative max-w-5xl w-full" @click.stop>
                        <img :src="currentSrc" class="w-full rounded-xl shadow-2xl object-contain max-h-[85vh]">
                        <div class="mt-3 text-center">
                            <span class="text-white/60 text-sm" x-text="`${currentIdx + 1} / ${images.length}`"></span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Compartilhar --}}
        <div class="mt-16 pt-8 border-t border-gray-100">
            <div class="flex items-center gap-3 mb-4">
                <div class="gold-line"></div>
                <h3 class="font-heading text-lg font-bold text-navy-800">Compartilhar</h3>
            </div>
            <div class="flex items-center gap-3">
                <a
                    href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('web.pagina', $pagina->slug)) }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#1877F2] text-white text-sm font-medium hover:bg-[#166FE5] transition"
                >
                    <i class="fab fa-facebook-f"></i>
                    Facebook
                </a>
                <a
                    href="https://wa.me/?text={{ urlencode($pagina->title . ' - ' . route('web.pagina', $pagina->slug)) }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#25D366] text-white text-sm font-medium hover:bg-[#20BD5A] transition"
                >
                    <i class="fab fa-whatsapp"></i>
                    WhatsApp
                </a>
                <a
                    href="mailto:?subject={{ urlencode($pagina->title) }}&body={{ urlencode('Confira: ' . route('web.pagina', $pagina->slug)) }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-gray-600 text-white text-sm font-medium hover:bg-gray-700 transition"
                >
                    <i class="fas fa-envelope"></i>
                    E-mail
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
