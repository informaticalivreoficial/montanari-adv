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
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-white mb-4">Termos e Condições</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">Termos e Condições</span>
            </nav>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg prose-slate max-w-none
            prose-headings:font-heading prose-headings:text-navy-800
            prose-a:text-navy-700 prose-a:no-underline hover:prose-a:text-gold-600">
            {!! $terms_conditions !!}
        </div>
    </div>
</section>

@endsection