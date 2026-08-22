@extends('web.master.master')

@section('content')

{{-- Breadcrumb Hero --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0 pattern-dots opacity-5"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="gold-line"></div>
            </div>
            <h1 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">Resultado da Pesquisa</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">Pesquisa: {{ $search }}</span>
            </nav>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-8">
            <p class="text-gray-500">
                Foram encontrados <span class="font-semibold text-navy-800">{{ $ctotal }}</span> resultado(s) para
                "<span class="text-gold-600">{{ $search }}</span>"
            </p>
        </div>

        @if(!empty($servicos) && $servicos->count() > 0)
            <div class="mb-10">
                <h3 class="font-heading text-xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-gavel text-gold-500"></i> Áreas de Atuação
                </h3>
                <div class="space-y-4">
                    @foreach($servicos as $servico)
                        <a href="{{ route('web.servico', ['slug' => $servico->slug]) }}"
                           class="block p-5 rounded-xl border border-gray-100 hover:border-gold-200 hover:bg-gold-50/50 transition-all group">
                            <h4 class="font-semibold text-navy-800 group-hover:text-gold-600 transition-colors mb-1">
                                {{ $servico->titulo }}
                            </h4>
                            <p class="text-gray-500 text-sm">{{ strip_tags($servico->getContentWebAttribute()) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if(!empty($artigos) && $artigos->count() > 0)
            <div>
                <h3 class="font-heading text-xl font-bold text-navy-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-newspaper text-gold-500"></i> Artigos
                </h3>
                <div class="space-y-4">
                    @foreach($artigos as $artigo)
                        <a href="{{ route('web.blog.artigo', ['slug' => $artigo->slug]) }}"
                           class="block p-5 rounded-xl border border-gray-100 hover:border-gold-200 hover:bg-gold-50/50 transition-all group">
                            <h4 class="font-semibold text-navy-800 group-hover:text-gold-600 transition-colors mb-1">
                                {{ $artigo->titulo }}
                            </h4>
                            <p class="text-gray-500 text-sm">{{ strip_tags($artigo->getContentWebAttribute()) }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

        @if((!empty($servicos) && $servicos->count()) || (!empty($artigos) && $artigos->count()))
        @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-search text-gray-300 text-3xl"></i>
                </div>
                <h3 class="font-heading text-xl font-bold text-navy-800 mb-2">Nenhum resultado encontrado</h3>
                <p class="text-gray-500 mb-6">Tente pesquisar com outros termos.</p>
                <a href="{{ route('web.home') }}" class="btn-navy">
                    <i class="fas fa-home text-sm"></i> Voltar ao Início
                </a>
            </div>
        @endif
    </div>
</section>

@endsection
