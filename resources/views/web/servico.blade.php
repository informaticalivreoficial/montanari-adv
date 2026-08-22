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
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-white mb-4">{{ $servico->titulo }}</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <a href="{{ route('web.servicos') }}" class="hover:text-gold-400 transition-colors">Áreas de Atuação</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">{{ $servico->titulo }}</span>
            </nav>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-12">

            {{-- Main Content --}}
            <div class="lg:col-span-2">
                <article class="prose prose-lg prose-slate max-w-none
                    prose-headings:font-heading prose-headings:text-navy-800
                    prose-a:text-navy-700 prose-a:no-underline hover:prose-a:text-gold-600
                    prose-img:rounded-2xl">
                    <div class="text-gray-700 leading-relaxed text-base" style="white-space: pre-wrap;">
                        {!! $servico->content !!}
                    </div>
                </article>

                {{-- Gallery --}}
                @if($servico->images()->get()->count())
                    <div class="mt-12">
                        <h3 class="font-heading text-xl font-bold text-navy-800 mb-6">Galeria</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($servico->images() as $image)
                                <a href="{{ $image->getUrlImageAttribute() }}" target="_blank"
                                   class="block rounded-xl overflow-hidden aspect-square group">
                                    <img src="{{ $image->getUrlCroppedAttribute() }}" alt="{{ $servico->titulo }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="lg:col-span-1">
                <div class="bg-navy-50 rounded-2xl p-8 sticky top-28">
                    <div class="w-14 h-14 bg-navy-700 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-headset text-gold-500 text-xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-navy-800 mb-3">Precisa de Atendimento?</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">
                        Entre em contato para saber mais sobre esta área de atuação.
                    </p>

                    <div class="space-y-3 mb-6">
                        @if(!empty($configuracoes->phone))
                            <a href="tel:{{ $configuracoes->phone }}" class="flex items-center gap-3 text-sm text-navy-700 hover:text-gold-600 transition-colors">
                                <i class="fas fa-phone text-navy-500"></i> {{ $configuracoes->phone }}
                            </a>
                        @endif
                        @if(!empty($configuracoes->whatsapp))
                            <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank"
                               class="flex items-center gap-3 text-sm text-green-600 hover:text-green-700 transition-colors">
                                <i class="fab fa-whatsapp"></i> WhatsApp
                            </a>
                        @endif
                        @if(!empty($configuracoes->email))
                            <a href="mailto:{{ $configuracoes->email }}" class="flex items-center gap-3 text-sm text-navy-700 hover:text-gold-600 transition-colors">
                                <i class="fas fa-envelope text-navy-500"></i> {{ $configuracoes->email }}
                            </a>
                        @endif
                    </div>

                    <a href="{{ route('web.atendimento') }}" class="btn-navy w-full justify-center">
                        Agendar Consulta
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
