@extends('web.master.master')

@section('content')

{{-- Breadcrumb Hero --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0 pattern-dots opacity-5"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold-500/5 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <div class="flex items-center gap-4 mb-6">
                <div class="gold-line"></div>
            </div>
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-white mb-4">Áreas de Atuação</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">Áreas de Atuação</span>
            </nav>
        </div>
    </div>
</section>

@if(!empty($servicos) && $servicos->count())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($servicos as $index => $servico)
                <div class="reveal card-hover bg-white rounded-2xl p-8 border border-gray-100 group"
                     style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="w-16 h-16 bg-navy-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-gold-500 group-hover:scale-110 transition-all duration-500">
                        <i class="fas fa-gavel text-2xl text-navy-600 group-hover:text-white transition-colors duration-500"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-navy-800 mb-3">{{ $servico->titulo }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">{!! $servico->getContentWebSiteAttribute() !!}</p>
                    <a href="{{ route('web.servico', ['slug' => $servico->slug]) }}"
                       class="inline-flex items-center gap-2 text-navy-700 font-semibold text-sm hover:text-gold-600 transition-colors group/link">
                        Leia Mais
                        <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-12">
            @if($servicos->hasPages())
                <div class="flex justify-center">
                    {{ $servicos->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endif

@endsection
