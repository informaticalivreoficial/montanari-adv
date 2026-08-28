<div>
    {{-- Posts Grid --}}
    <section class="py-16 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if($posts->count() > 0)

                {{-- Featured Post --}}
                @if($posts->count() > 0)
                    @php $featured = $posts->first(); @endphp
                    <article class="reveal mb-12 group">
                        <a href="{{ route('web.blog.artigo', ['slug' => $featured->slug]) }}"
                           class="block bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-gray-100">
                            <div class="grid md:grid-cols-2 gap-0">
                                <div class="relative h-72 md:h-96 overflow-hidden">
                                    <img src="{{ $featured->cover() }}" alt="{{ $featured->title }}"
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-r from-navy-900/30 to-transparent"></div>
                                </div>
                                <div class="p-8 md:p-10 flex flex-col justify-center">
                                    <div class="flex items-center gap-3 mb-4">
                                        <span class="px-3 py-1 bg-gold-500/10 text-gold-700 text-xs font-bold rounded-full uppercase tracking-wider">
                                            Destaque
                                        </span>
                                        @if($featured->categoriaObject)
                                            <span class="px-3 py-1 bg-navy-50 text-navy-600 text-xs font-semibold rounded-full">
                                                {{ $featured->categoriaObject->title }}
                                            </span>
                                        @endif
                                    </div>
                                    <h2 class="font-heading text-2xl md:text-3xl font-bold text-navy-800 mb-3 group-hover:text-gold-600 transition-colors">
                                        {{ $featured->title }}
                                    </h2>
                                    <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">
                                        {!! $featured->getContentWebSiteAttribute() !!}
                                    </p>
                                    <div class="flex items-center gap-4 text-gray-400 text-xs">
                                        <span class="flex items-center gap-1.5">
                                            <i class="far fa-calendar text-gold-500"></i>
                                            {{ optional($featured->publish_at)->format('d/m/Y') }}
                                        </span>
                                        @if($featured->readingTime)
                                            <span class="flex items-center gap-1.5">
                                                <i class="far fa-clock text-gold-500"></i>
                                                {{ $featured->readingTime }} min de leitura
                                            </span>
                                        @endif
                                        <span class="flex items-center gap-1.5">
                                            <i class="far fa-eye text-gold-500"></i>
                                            {{ $featured->views }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                @endif

                {{-- Posts Grid --}}
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts->skip(1) as $index => $artigo)
                        <article class="reveal blog-card bg-white rounded-2xl overflow-hidden border border-gray-100 group"
                                 style="animation-delay: {{ ($index % 3) * 0.08 }}s">
                            <div class="relative h-52 overflow-hidden">
                                <a href="{{ route('web.blog.artigo', ['slug' => $artigo->slug]) }}">
                                    <img src="{{ $artigo->cover() }}" alt="{{ $artigo->title }}"
                                         class="blog-card-image w-full h-full object-cover">
                                </a>
                                <div class="absolute inset-0 bg-gradient-to-t from-navy-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                @if($artigo->categoriaObject)
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1.5 bg-navy-800/90 backdrop-blur-sm text-white text-xs font-medium rounded-full">
                                            {{ $artigo->categoriaObject->title }}
                                        </span>
                                    </div>
                                @endif

                                @if($artigo->highlight)
                                    <div class="absolute top-4 right-4">
                                        <span class="px-2.5 py-1 bg-gold-500 text-white text-[10px] font-bold rounded-full uppercase tracking-wider">
                                            <i class="fas fa-star mr-0.5"></i> Destaque
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="p-6">
                                <div class="flex items-center gap-3 text-gray-400 text-xs mb-3">
                                    <span class="flex items-center gap-1.5">
                                        <i class="far fa-calendar text-gold-500"></i>
                                        {{ optional($artigo->publish_at)->format('d/m/Y') }}
                                    </span>
                                    @if($artigo->readingTime)
                                        <span class="flex items-center gap-1.5">
                                            <i class="far fa-clock text-gold-500"></i>
                                            {{ $artigo->readingTime }} min
                                        </span>
                                    @endif
                                </div>

                                <a href="{{ route('web.blog.artigo', ['slug' => $artigo->slug]) }}">
                                    <h3 class="font-heading text-lg font-bold text-navy-800 mb-3 group-hover:text-gold-600 transition-colors line-clamp-2 leading-snug">
                                        {{ $artigo->title }}
                                    </h3>
                                </a>

                                <p class="text-gray-500 text-sm leading-relaxed mb-5 line-clamp-3">
                                    {!! $artigo->getContentWebSiteAttribute() !!}
                                </p>

                                <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                                    <a href="{{ route('web.blog.artigo', ['slug' => $artigo->slug]) }}"
                                       class="inline-flex items-center gap-2 text-navy-700 font-semibold text-sm hover:text-gold-600 transition-colors group/link">
                                        Leia Mais
                                        <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                                    </a>

                                    <div class="flex items-center gap-1.5 text-gray-400 text-xs">
                                        <i class="far fa-eye"></i>
                                        {{ $artigo->views }}
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                {{-- Load More Button --}}
                @if($hasMore)
                    <div class="mt-12 text-center">
                        <button wire:click="loadMore"
                                wire:loading.attr="disabled"
                                class="inline-flex items-center gap-2 px-8 py-3.5 bg-navy-800 text-white font-semibold text-sm rounded-full
                                       hover:bg-navy-700 transition-all duration-300
                                       disabled:opacity-50 disabled:cursor-not-allowed
                                       shadow-lg shadow-navy-800/20 hover:shadow-xl hover:shadow-navy-800/30">
                            <span wire:loading.remove wire:target="loadMore">
                                Carregar Mais Artigos
                            </span>
                            <span wire:loading wire:target="loadMore">
                                <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                            <i class="fas fa-arrow-down text-xs"></i>
                        </button>
                        <p class="mt-3 text-gray-400 text-xs">
                            Mostrando {{ $posts->count() }} de {{ $totalPosts }} artigos
                        </p>
                    </div>
                @else
                    @if($posts->count() > 0)
                        <div class="mt-12 text-center">
                            <div class="inline-flex items-center gap-2 text-gray-400 text-sm">
                                <div class="w-12 h-px bg-gray-200"></div>
                                <span>Você viu todos os artigos</span>
                                <div class="w-12 h-px bg-gray-200"></div>
                            </div>
                        </div>
                    @endif
                @endif

            @else
                {{-- Empty State --}}
                <div class="py-24 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-newspaper text-3xl text-gray-300"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-navy-800 mb-2">Nenhum artigo encontrado</h3>
                    <p class="text-gray-500 text-sm">Volte em breve!</p>
                </div>
            @endif
        </div>
    </section>
</div>
