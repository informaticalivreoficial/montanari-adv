@extends('web.master.master')

@section('content')

{{-- Breadcrumb Hero --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0">
        @if($post->nocover())
            <img src="{{ $post->nocover() }}" alt="{{ $post->titulo }}" class="w-full h-full object-cover opacity-20">
        @endif
        <div class="hero-overlay absolute inset-0"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="gold-line"></div>
                <span class="px-3 py-1.5 bg-gold-500/20 text-gold-400 text-xs font-medium rounded-full">
                    {{ $post->categoriaObject->titulo }}
                </span>
            </div>
            <h1 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">{{ $post->titulo }}</h1>
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
                @if($post->images()->get()->count())
                    <div class="mt-12">
                        <h3 class="font-heading text-xl font-bold text-navy-800 mb-6">Galeria</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($post->images() as $image)
                                <a href="{{ $image->getUrlImageAttribute() }}" target="_blank"
                                   class="block rounded-xl overflow-hidden aspect-square group">
                                    <img src="{{ $image->getUrlCroppedAttribute() }}" alt="{{ $post->titulo }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Share --}}
                <div class="mt-12 pt-8 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <h4 class="font-heading font-bold text-navy-800">Compartilhar</h4>
                        <div class="flex items-center gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"
                               class="w-10 h-10 bg-navy-50 hover:bg-blue-600 rounded-lg flex items-center justify-center text-navy-600 hover:text-white transition-all duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://web.whatsapp.com/send?text={{ url()->current() }}" target="_blank"
                               class="w-10 h-10 bg-navy-50 hover:bg-green-500 rounded-lg flex items-center justify-center text-navy-600 hover:text-white transition-all duration-300">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" target="_blank"
                               class="w-10 h-10 bg-navy-50 hover:bg-sky-500 rounded-lg flex items-center justify-center text-navy-600 hover:text-white transition-all duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}" target="_blank"
                               class="w-10 h-10 bg-navy-50 hover:bg-blue-700 rounded-lg flex items-center justify-center text-navy-600 hover:text-white transition-all duration-300">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
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
                                @if($categoria->children)
                                    @foreach($categoria->children as $subcategoria)
                                        @if($subcategoria->countposts() >= 1)
                                            <a href="{{ route('web.blog.categoria', ['slug' => $subcategoria->slug]) }}"
                                               class="flex items-center justify-between py-2.5 px-3 rounded-lg hover:bg-white transition-colors group">
                                                <span class="text-sm text-gray-600 group-hover:text-navy-700 transition-colors flex items-center gap-2">
                                                    <i class="fas fa-folder-open text-gold-500/50 text-xs"></i>
                                                    {{ $subcategoria->titulo }}
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
                                    <img src="{{ $postMais->cover() }}" alt="{{ $postMais->titulo }}"
                                         class="w-16 h-16 rounded-lg object-cover flex-shrink-0 group-hover:scale-105 transition-transform">
                                    <div>
                                        <h5 class="text-sm font-semibold text-navy-800 group-hover:text-gold-600 transition-colors line-clamp-2 leading-tight">
                                            {{ $postMais->titulo }}
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
