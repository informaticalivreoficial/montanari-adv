@extends('web.master.master')

@section('content')

{{-- ============================== --}}
{{-- HERO SECTION                  --}}
{{-- ============================== --}}
@if(!empty($slides) && $slides->count())
<section class="relative min-h-screen flex items-center overflow-hidden" id="page">
    @php $slide = $slides->first(); @endphp
    <div class="absolute inset-0">
        <img src="{{ $slide->getimagem() }}" alt="{{ $configuracoes->app_name }}"
             class="w-full h-full object-cover">
        <div class="hero-overlay absolute inset-0"></div>
    </div>

    {{-- Decorative elements --}}
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-navy-400/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="max-w-3xl">
            {{-- Gold accent line --}}
            <div class="flex items-center gap-4 mb-8 animate-fade-in">
                <div class="gold-line"></div>
                <span class="text-gold-400 text-sm font-semibold tracking-[0.2em] uppercase">Advocacia & Consultoria</span>
            </div>

            <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-[1.1] mb-6 animate-slide-up">
                @if(!empty($slide->titulo))
                    {{ $slide->titulo }}
                @else
                    Excelência em<br>
                    <span class="text-gold-400">Direito</span> e Advocacia
                @endif
            </h1>

            <div class="text-xl text-white/70 leading-relaxed mb-10 max-w-2xl animate-slide-up" style="animation-delay: 0.1s">
                @if(!empty($slide->content))
                    {!! $slide->content !!}
                @else
                    {{ $configuracoes->information }}
                @endif
            </div>

            <div class="flex flex-wrap gap-4 animate-slide-up" style="animation-delay: 0.2s">
                <a href="{{ route('web.atendimento') }}" class="btn-primary">
                    <i class="fas fa-headset"></i>
                    Agendar Consulta
                </a>
                <a href="{{ route('web.servicos') }}" class="btn-outline">
                    <i class="fas fa-gavel"></i>
                    Áreas de Atuação
                </a>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#about-us" class="text-white/40 hover:text-white/70 transition-colors">
            <div class="w-8 h-12 border-2 border-white/20 rounded-full flex justify-center pt-2">
                <div class="w-1 h-3 bg-gold-500 rounded-full animate-pulse"></div>
            </div>
        </a>
    </div>
</section>
@else
{{-- Hero without slides --}}
<section class="relative min-h-screen flex items-center bg-navy-950 overflow-hidden" id="page">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 right-20 w-96 h-96 border border-gold-500/20 rounded-full"></div>
        <div class="absolute bottom-20 left-20 w-64 h-64 border border-navy-400/20 rounded-full"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
        <div class="max-w-3xl">
            <div class="flex items-center gap-4 mb-8">
                <div class="gold-line"></div>
                <span class="text-gold-400 text-sm font-semibold tracking-[0.2em] uppercase">Advocacia & Consultoria</span>
            </div>

            <h1 class="font-heading text-5xl md:text-6xl lg:text-7xl font-bold text-white leading-[1.1] mb-6">
                Excelência em<br>
                <span class="text-gold-400">Direito</span> e Advocacia
            </h1>

            <p class="text-xl text-white/70 leading-relaxed mb-10 max-w-2xl">
                {{ $configuracoes->information }}
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('web.atendimento') }}" class="btn-primary">
                    <i class="fas fa-headset"></i>
                    Agendar Consulta
                </a>
                <a href="{{ route('web.servicos') }}" class="btn-outline">
                    <i class="fas fa-gavel"></i>
                    Áreas de Atuação
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <a href="#about-us" class="text-white/40 hover:text-white/70 transition-colors">
            <div class="w-8 h-12 border-2 border-white/20 rounded-full flex justify-center pt-2">
                <div class="w-1 h-3 bg-gold-500 rounded-full animate-pulse"></div>
            </div>
        </a>
    </div>
</section>
@endif


{{-- ============================== --}}
{{-- ABOUT US                      --}}
{{-- ============================== --}}
<section class="py-24 bg-white" id="about-us">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            {{-- Image Side --}}
            <div class="reveal relative">
                <div class="relative">
                    <img src="{{ url('frontend/assets/images/about/01_about.jpg') }}" alt="Escritório"
                         class="w-full rounded-2xl shadow-2xl shadow-navy-900/10">
                    {{-- Stats badge --}}
                    <div class="absolute -bottom-6 -right-6 bg-navy-800 text-white rounded-2xl p-6 shadow-xl">
                        <div class="stat-number text-4xl mb-1">25+</div>
                        <div class="text-white/60 text-sm font-medium">Anos de Experiência</div>
                    </div>
                </div>
                {{-- Decorative --}}
                <div class="absolute -top-4 -left-4 w-24 h-24 border-2 border-gold-500/30 rounded-2xl -z-10"></div>
            </div>

            {{-- Text Side --}}
            <div class="reveal">
                <div class="flex items-center gap-4 mb-6">
                    <div class="gold-line"></div>
                    <span class="text-gold-600 text-sm font-semibold tracking-[0.15em] uppercase">Sobre o Escritório</span>
                </div>

                <h2 class="font-heading text-4xl md:text-5xl font-bold text-navy-800 mb-6 leading-tight">
                    Compromisso com a<br>
                    <span class="text-gold-600">Excelência</span>
                </h2>

                <div class="text-gray-600 leading-relaxed space-y-4 mb-8">
                    <p>
                        Nosso escritório possui sede no município de Itapeva, e atua também nas cidades
                        de Itararé, Itaberá, Buri, Capão Bonito, Apiaí e Ribeirão Branco, bem como possui
                        correspondente na cidade de Ubatuba-SP.
                    </p>
                    <p>
                        Atuamos também em todas as cidades que possuem foros digitais
                        (peticionamento eletrônico), inclusive na Capital SP. Seguindo os conceitos de
                        eficiência e ética, o escritório conta com uma equipe qualificada, apostando
                        sempre na qualidade dos serviços prestados.
                    </p>
                </div>

                {{-- Features --}}
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gold-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield-halved text-gold-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-800 text-sm">Ética Profissional</h4>
                            <p class="text-gray-500 text-xs mt-1">Conduta íntegra em cada ato</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gold-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-bolt text-gold-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-800 text-sm">Agilidade</h4>
                            <p class="text-gray-500 text-xs mt-1">Respostas rápidas e eficientes</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gold-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-handshake text-gold-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-800 text-sm">Personalizado</h4>
                            <p class="text-gray-500 text-xs mt-1">Atendimento dedicado a você</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gold-50 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-scale-balanced text-gold-600"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-800 text-sm">Resultados</h4>
                            <p class="text-gray-500 text-xs mt-1">Foco na solução do problema</p>
                        </div>
                    </div>
                </div>

                <a href="{{ route('web.atendimento') }}" class="btn-navy">
                    Entre em Contato
                    <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
        </div>
    </div>
</section>


{{-- ============================== --}}
{{-- PRACTICE AREAS               --}}
{{-- ============================== --}}
<section class="py-24 bg-gray-50 relative overflow-hidden">
    {{-- Decorative --}}
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-gold-300/40 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-title reveal">
            <div class="gold-line-center mb-6"></div>
            <h2>Áreas de Atuação</h2>
            <p>Atuamos com dedicação e competência em diversas áreas do Direito para proteger seus interesses.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Card Template --}}
            @php
                $areas = [
                    ['icon' => 'fa-shield-halved', 'title' => 'Direito Militar', 'desc' => 'Orientação e defesa do Policial Militar nos procedimentos administrativos e processos judiciais referentes ao RDPM e patrocínio de ações contra o Estado em favor do PM Efetivo e Temporário.'],
                    ['icon' => 'fa-building-columns', 'title' => 'Direito Previdenciário', 'desc' => 'Atuamos assessorando e orientando desde a contagem do tempo de contribuição, simulação do valor da aposentadoria, análise de vínculos empregatícios e recolhimentos.'],
                    ['icon' => 'fa-car', 'title' => 'Diligências', 'desc' => 'Facilitamos essa prática aos nossos colegas advogados que precisam de um advogado correspondente em Itapeva (SP) e região.'],
                ];
            @endphp

            @foreach($areas as $index => $area)
                <div class="reveal card-hover bg-white rounded-2xl p-8 border border-gray-100 group"
                     style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="w-16 h-16 bg-navy-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-gold-500 group-hover:scale-110 transition-all duration-500">
                        <i class="fas {{ $area['icon'] }} text-2xl text-navy-600 group-hover:text-white transition-colors duration-500"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-navy-800 mb-3">{{ $area['title'] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">{{ $area['desc'] }}</p>
                    <a href="{{ route('web.servicos') }}" class="inline-flex items-center gap-2 text-navy-700 font-semibold text-sm hover:text-gold-600 transition-colors group/link">
                        Saiba Mais
                        <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            @endforeach

            {{-- Dynamic areas from DB --}}
            @if(!empty($servicos) && $servicos->count())
                @foreach($servicos->take(3) as $servico)
                    <div class="reveal card-hover bg-white rounded-2xl p-8 border border-gray-100 group">
                        <div class="w-16 h-16 bg-navy-50 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-gold-500 group-hover:scale-110 transition-all duration-500">
                            <i class="fas fa-gavel text-2xl text-navy-600 group-hover:text-white transition-colors duration-500"></i>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-navy-800 mb-3">{{ $servico->titulo }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">{!! $servico->getContentWebSiteAttribute() !!}</p>
                        <a href="{{ route('web.servico', ['slug' => $servico->slug]) }}" class="inline-flex items-center gap-2 text-navy-700 font-semibold text-sm hover:text-gold-600 transition-colors group/link">
                            Leia Mais
                            <i class="fas fa-arrow-right text-xs group-hover/link:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="text-center mt-12 reveal">
            <a href="{{ route('web.servicos') }}" class="btn-navy">
                Ver Todas as Áreas
                <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>


{{-- ============================== --}}
{{-- CTA SECTION                  --}}
{{-- ============================== --}}
<section class="relative py-20 bg-navy-800 overflow-hidden">
    <div class="absolute inset-0 pattern-dots opacity-10"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-500/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="reveal">
                <div class="flex items-center gap-4 mb-6">
                    <div class="gold-line"></div>
                    <span class="text-gold-400 text-sm font-semibold tracking-[0.15em] uppercase">Fale Conosco</span>
                </div>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4 leading-tight">
                    Precisa de<br>
                    <span class="text-gold-400">Assessoria Jurídica?</span>
                </h2>
                <p class="text-white/60 leading-relaxed mb-8">
                    Nossa equipe está pronta para atender você. Agende uma consulta e descubra
                    como podemos ajudar a resolver sua questão jurídica.
                </p>
                <a href="{{ route('web.atendimento') }}" class="btn-primary">
                    <i class="fas fa-headset"></i>
                    Agendar Consulta
                </a>
            </div>

            <div class="reveal" style="animation-delay: 0.2s">
                <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="stat-number" x-data x-intersect.once="$el.textContent = '500+'">0</div>
                            <div class="text-white/50 text-sm mt-2">Clientes Atendidos</div>
                        </div>
                        <div class="text-center">
                            <div class="stat-number" x-data x-intersect.once="$el.textContent = '1000+'">0</div>
                            <div class="text-white/50 text-sm mt-2">Processos Analisados</div>
                        </div>
                        <div class="text-center">
                            <div class="stat-number" x-data x-intersect.once="$el.textContent = '25+'">0</div>
                            <div class="text-white/50 text-sm mt-2">Anos de Experiência</div>
                        </div>
                        <div class="text-center">
                            <div class="stat-number" x-data x-intersect.once="$el.textContent = '95%'">0</div>
                            <div class="text-white/50 text-sm mt-2">Taxa de Sucesso</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ============================== --}}
{{-- BLOG SECTION                 --}}
{{-- ============================== --}}
@if(!empty($artigos) && $artigos->count())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-title reveal">
            <div class="gold-line-center mb-6"></div>
            <h2>Blog & Artigos</h2>
            <p>Fique por dentro das novidades jurídicas e dicas importantes do nosso time de especialistas.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($artigos as $index => $artigo)
                <article class="reveal blog-card bg-white rounded-2xl overflow-hidden border border-gray-100 group"
                         style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ url($artigo->cover()) }}" alt="{{ $artigo->titulo }}"
                             class="blog-card-image w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-navy-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        {{-- Category badge --}}
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1.5 bg-navy-800/90 backdrop-blur-sm text-white text-xs font-medium rounded-full">
                                {{ $artigo->categoriaObject->titulo }}
                            </span>
                        </div>
                    </div>

                    <div class="p-6">
                        {{-- Date --}}
                        <div class="flex items-center gap-2 text-gray-400 text-xs mb-3">
                            <i class="far fa-calendar"></i>
                            <span>{{ optional($artigo->publish_at)->format('d/m/Y') }}</span>
                            <span class="text-gray-200">•</span>
                            <i class="far fa-clock"></i>
                            <span>{{ $artigo->reading_time ?? '5 min' }}</span>
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

        <div class="text-center mt-12 reveal">
            <a href="{{ route('web.blog.artigos') }}" class="btn-navy">
                Ver Todos os Artigos
                <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>
@endif


{{-- ============================== --}}
{{-- NEWSLETTER                   --}}
{{-- ============================== --}}
<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-2xl mx-auto text-center">
            <div class="w-14 h-14 bg-gold-50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-envelope-open-text text-gold-600 text-xl"></i>
            </div>
            <h3 class="font-heading text-2xl font-bold text-navy-800 mb-3">Receba Novidades</h3>
            <p class="text-gray-500 text-sm mb-6">Inscreva-se em nossa newsletter e fique atualizado sobre as principais novidades do mundo jurídico.</p>

            <form action="{{ route('web.sendNewsletter') }}" method="POST" class="flex gap-2 max-w-md mx-auto" id="newsletter-form">
                @csrf
                <input type="email" name="email" placeholder="Seu melhor e-mail" required
                       class="flex-1 px-4 py-3 border border-gray-200 rounded-lg text-sm bg-white focus:border-navy-500 focus:ring-2 focus:ring-navy-500/20 transition-all">
                <button type="submit" class="px-6 py-3 bg-navy-700 text-white rounded-lg font-semibold text-sm hover:bg-navy-800 transition-colors whitespace-nowrap">
                    Inscrever
                </button>
            </form>
        </div>
    </div>
</section>

@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    });
</script>
@endsection
