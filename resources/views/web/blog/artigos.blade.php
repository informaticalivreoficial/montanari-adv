@extends('web.master.master')

@section('content')

{{-- Hero Section --}}
<section class="relative py-32 bg-navy-900 overflow-hidden breadcrumb-hero">
    <div class="absolute inset-0 pattern-dots opacity-5"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-gold-500/5 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="gold-line"></div>
                <span class="text-gold-400 text-sm font-semibold tracking-widest uppercase">Artigos & Insights</span>
                <div class="gold-line"></div>
            </div>
            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Blog
            </h1>
            <p class="text-white/60 text-lg leading-relaxed max-w-2xl mx-auto">
                Artigos, notícias e orientações sobre direito. Mantenha-se informado com conteúdo de especialistas.
            </p>
        </div>
    </div>
</section>

{{-- Livewire Blog Listing --}}
@livewire('web.blog.blog-listing')

@endsection
