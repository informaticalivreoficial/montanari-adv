@extends('web.master.master')

@section('content')

{{-- Breadcrumb Hero --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0 pattern-dots opacity-5"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold-500/5 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="gold-line"></div>
            </div>
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-white mb-4">Blog — {{ $categoria->titulo }}</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <a href="{{ route('web.blog.artigos') }}" class="hover:text-gold-400 transition-colors">Blog</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">{{ $categoria->titulo }}</span>
            </nav>
        </div>
    </div>
</section>

@if(!empty($categoria->content))
<section class="py-12 bg-gray-50 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl text-gray-600 leading-relaxed">
            {!! $categoria->content !!}
        </div>
    </div>
</section>
@endif

@if($posts->count())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $index => $artigo)
                <article class="reveal blog-card bg-white rounded-2xl overflow-hidden border border-gray-100 group"
                         style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ $artigo->nocover() }}" alt="{{ $artigo->titulo }}"
                             class="blog-card-image w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1.5 bg-navy-800/90 backdrop-blur-sm text-white text-xs font-medium rounded-full">
                                {{ $artigo->categoriaObject->titulo }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                            <i class="far fa-calendar"></i>
                            <span>{{ optional($artigo->publish_at)->format('d/m/Y') }}</span>
                        </div>

                        <a href="{{ route('web.blog.artigo', ['slug' => $artigo->slug]) }}">
                            <h3 class="font-heading text-lg font-bold text-navy-800 mb-3 group-hover:text-gold-600 transition-colors line-clamp-2">
                                {{ $artigo->titulo }}
                            </h3>
                        </a>

                        <p class="text-gray-500 text-sm leading-relaxed mb-4 line-clamp-3">
                            {!! $artigo->getContentWebAttribute() !!}
                        </p>

                        <a href="{{ route('web.blog.artigo', ['slug' => $artigo->slug]) }}"
                           class="inline-flex items-center gap-2 text-navy-700 font-semibold text-sm hover:text-gold-600 transition-colors group/link">
                            Leia Mais
                            <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        @if($posts->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endif

@endsection
