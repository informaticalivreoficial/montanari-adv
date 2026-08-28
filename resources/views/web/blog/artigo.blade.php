@extends('web.master.master')

@section('content')

{{-- Breadcrumb Hero --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0">
        @if($post->nocover())
            <img src="{{ $post->nocover() }}" alt="{{ $post->title }}" class="w-full h-full object-cover opacity-20">
        @endif
        <div class="hero-overlay absolute inset-0"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="gold-line"></div>
                <span class="px-3 py-1.5 bg-gold-500/20 text-gold-400 text-xs font-medium rounded-full">
                    {{ $post->categoriaObject->title }}
                </span>
            </div>
            <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">{{ $post->title }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-white/50 text-sm">
                <span class="flex items-center gap-2">
                    <i class="far fa-calendar text-gold-500"></i>
                    {{ optional($post->publish_at)->format('d/m/Y') }}
                </span>
                <span class="w-1 h-1 bg-white/20 rounded-full"></span>
                <span class="flex items-center gap-2">
                    <i class="far fa-clock text-gold-500"></i>
                    {{ $post->reading_time ?? '5 min de leitura' }}
                </span>
            </div>
        </div>
    </div>
</section>

{{-- Article Content --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Main Content --}}
            <div class="lg:col-span-2">
                <article class="prose prose-lg prose-slate max-w-none
                    prose-headings:font-heading prose-headings:text-navy-800
                    prose-a:text-navy-700 prose-a:no-underline hover:prose-a:text-gold-600
                    prose-img:rounded-2xl">
                    <div class="text-gray-700 leading-relaxed text-base" style="white-space: pre-wrap;">
                        {!! $post->content !!}
                    </div>
                </article>

                {{-- Gallery --}}
                @if($post->images->count())
                    <div class="mt-12" x-data="{ lightbox: false, currentSrc: '', currentIdx: 0, images: {{ $post->images->sortBy('order')->map(fn($img) => ['src' => \App\Services\Asset::url($img->path), 'caption' => $img->thumb_caption ?? ''])->values()->toJson() }} }">
                        <h3 class="font-heading text-xl font-bold text-navy-800 mb-6">Galeria</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($post->images->sortBy('order') as $idx => $image)
                                <button
                                    @click="currentIdx = {{ $idx }}; currentSrc = images[{{ $idx }}].src; lightbox = true"
                                    class="group relative rounded-xl overflow-hidden aspect-square bg-gray-100 cursor-pointer"
                                >
                                    <img src="{{ \App\Services\Asset::url($image->path) }}" alt="{{ $post->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
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
                            <button @click="lightbox = false" class="absolute top-4 right-4 z-10 h-10 w-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition">
                                <i class="fas fa-xmark text-lg"></i>
                            </button>
                            <button
                                @click="currentIdx = currentIdx > 0 ? currentIdx - 1 : images.length - 1; currentSrc = images[currentIdx].src;"
                                class="absolute left-4 z-10 h-10 w-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition"
                            >
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button
                                @click="currentIdx = currentIdx < images.length - 1 ? currentIdx + 1 : 0; currentSrc = images[currentIdx].src;"
                                class="absolute right-4 z-10 h-10 w-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition"
                            >
                                <i class="fas fa-chevron-right"></i>
                            </button>
                            <div class="relative max-w-5xl w-full" @click.stop>
                                <img :src="currentSrc" class="w-full rounded-xl shadow-2xl object-contain max-h-[85vh]">
                                <div class="mt-3 text-center">
                                    <span class="text-white/60 text-sm" x-text="`${currentIdx + 1} / ${images.length}`"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Share --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="gold-line"></div>
                        <h3 class="font-heading text-lg font-bold text-navy-800">Compartilhar</h3>
                    </div>
                    <div class="flex items-center gap-3">
                        <a
                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#1877F2] text-white text-sm font-medium hover:bg-[#166FE5] transition"
                        >
                            <i class="fab fa-facebook-f"></i>
                            Facebook
                        </a>
                        <a
                            href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url()->current()) }}"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#25D366] text-white text-sm font-medium hover:bg-[#20BD5A] transition"
                        >
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp
                        </a>
                        <a
                            href="mailto:?subject={{ urlencode($post->title) }}&body={{ urlencode('Confira: ' . url()->current()) }}"
                            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-gray-600 text-white text-sm font-medium hover:bg-gray-700 transition"
                        >
                            <i class="fas fa-envelope"></i>
                            E-mail
                        </a>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1 space-y-8">
                {{-- Search --}}
                <div class="bg-gray-50 rounded-2xl p-6">
                    <h4 class="font-heading font-bold text-navy-800 mb-4">Pesquisar</h4>
                    <form action="{{ route('web.pesquisa') }}" method="POST">
                        @csrf
                        <div class="flex gap-2">
                            <input type="search" name="search" placeholder="Pesquisar..."
                                   class="flex-1 px-4 py-3 border border-gray-200 rounded-lg text-sm bg-white focus:border-navy-500 focus:ring-2 focus:ring-navy-500/20">
                            <button type="submit" class="px-4 py-3 bg-navy-700 text-white rounded-lg hover:bg-navy-800 transition-colors">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Categories --}}
                @if(!empty($categorias) && $categorias->count())
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h4 class="font-heading font-bold text-navy-800 mb-4">Categorias</h4>
                        <div class="space-y-2">
                            @foreach($categorias as $categoria)
                                @php $postCount = $categoria->countposts(); @endphp
                                @if($postCount >= 1)
                                    <a href="{{ route('web.blog.categoria', ['slug' => $categoria->slug]) }}"
                                       class="flex items-center justify-between py-2.5 px-3 rounded-lg hover:bg-white transition-colors group">
                                        <span class="text-sm text-gray-600 group-hover:text-navy-700 transition-colors flex items-center gap-2">
                                            <i class="fas fa-folder-open text-gold-500/50 text-xs"></i>
                                            {{ $categoria->title }}
                                        </span>
                                        <span class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ $postCount }}</span>
                                    </a>
                                @endif
                                @if($categoria->children && $categoria->children->count())
                                    @foreach($categoria->children as $subcategoria)
                                        @if($subcategoria->countposts() >= 1)
                                            <a href="{{ route('web.blog.categoria', ['slug' => $subcategoria->slug]) }}"
                                               class="flex items-center justify-between py-2.5 pl-8 pr-3 rounded-lg hover:bg-white transition-colors group">
                                                <span class="text-sm text-gray-500 group-hover:text-navy-700 transition-colors flex items-center gap-2">
                                                    <i class="fas fa-folder-open text-gold-500/30 text-xs"></i>
                                                    {{ $subcategoria->title }}
                                                </span>
                                                <span class="text-xs text-gray-400 bg-white px-2 py-0.5 rounded-full">{{ $subcategoria->countposts() }}</span>
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Recent Posts --}}
                @if(!empty($postsMais) && $postsMais->count())
                    <div class="bg-gray-50 rounded-2xl p-6">
                        <h4 class="font-heading font-bold text-navy-800 mb-4">Veja Também</h4>
                        <div class="space-y-4">
                            @foreach($postsMais as $postMais)
                                <a href="{{ route('web.blog.artigo', ['slug' => $postMais->slug]) }}"
                                   class="flex gap-3 group">
                                    <img src="{{ $postMais->cover() }}" alt="{{ $postMais->title }}"
                                         class="w-16 h-16 rounded-lg object-cover flex-shrink-0 group-hover:scale-105 transition-transform">
                                    <div>
                                        <h5 class="text-sm font-semibold text-navy-800 group-hover:text-gold-600 transition-colors line-clamp-2 leading-tight">
                                            {{ $postMais->title }}
                                        </h5>
                                        <span class="text-xs text-gray-400 mt-1 block">{{ optional($postMais->publish_at)->format('d/m/Y') }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
