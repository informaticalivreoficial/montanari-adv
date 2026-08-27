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
            <h1 class="font-heading text-4xl md:text-5xl font-bold text-white mb-4">Atendimento</h1>
            <nav class="flex items-center gap-2 text-white/50 text-sm">
                <a href="{{ route('web.home') }}" class="hover:text-gold-400 transition-colors">Início</a>
                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i>
                <span class="text-white/80">Atendimento</span>
            </nav>
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-16">

            {{-- Contact Info --}}
            <div class="lg:col-span-2 reveal" x-data="{
                raw: {
                    phone: '{{ $configuracoes->phone ?? '' }}',
                    cell: '{{ $configuracoes->cell_phone ?? '' }}',
                    whats: '{{ $configuracoes->whatsapp ?? '' }}'
                },
                phone: '',
                cell: '',
                whats: '',
                mask(v) {
                    v = v.replace(/\D/g, '');
                    if (v.length <= 10) return v.replace(/^(\d{2})(\d{0,4})(\d{0,4})/, '($1) $2-$3').replace(/-$/, '');
                    return v.replace(/^(\d{2})(\d{0,5})(\d{0,4})/, '($1) $2-$3').replace(/-$/, '');
                },
                init() {
                    this.phone = this.mask(this.raw.phone);
                    this.cell = this.mask(this.raw.cell);
                    this.whats = this.mask(this.raw.whats);
                }
            }">
                <div class="flex items-center gap-4 mb-6">
                    <div class="gold-line"></div>
                    <span class="text-gold-600 text-sm font-semibold tracking-[0.15em] uppercase">Fale Conosco</span>
                </div>
                <h2 class="font-heading text-3xl font-bold text-navy-800 mb-4">Entre em Contato</h2>
                <p class="text-gray-500 leading-relaxed mb-10">
                    Estamos à disposição para atender você. Preencha o formulário ou utilize um de nossos canais de atendimento.
                </p>

                <div class="space-y-6">
                    @if(!empty($configuracoes->phone) || !empty($configuracoes->cell_phone))
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-navy-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-navy-600"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Telefone</p>
                                @if(!empty($configuracoes->phone))
                                    <a href="tel:{{ $configuracoes->phone }}" class="text-navy-800 font-semibold hover:text-gold-600 transition-colors block" x-text="phone"></a>
                                @endif
                                @if(!empty($configuracoes->cell_phone))
                                    <a href="tel:{{ $configuracoes->cell_phone }}" class="text-navy-800 font-semibold hover:text-gold-600 transition-colors block" x-text="cell"></a>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if(!empty($configuracoes->whatsapp))
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fab fa-whatsapp text-green-600 text-lg"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">WhatsApp</p>
                                <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}"
                                   target="_blank" class="text-green-600 font-semibold hover:text-green-700 transition-colors" x-text="whats"></a>
                            </div>
                        </div>
                    @endif

                    @if(!empty($configuracoes->email))
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-navy-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-navy-600"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">E-mail</p>
                                <a href="mailto:{{ $configuracoes->email }}" class="text-navy-800 font-semibold hover:text-gold-600 transition-colors break-all">
                                    {{ $configuracoes->email }}
                                </a>
                            </div>
                        </div>
                    @endif

                    @if(!empty($configuracoes->street))
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-navy-50 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-navy-600"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Endereço</p>
                                <p class="text-navy-800 text-sm leading-relaxed">
                                    {{ $configuracoes->street }}{{ !empty($configuracoes->number) ? ', ' . $configuracoes->number : '' }}{{ !empty($configuracoes->neighborhood) ? ' - ' . $configuracoes->neighborhood : '' }}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Client Portal --}}
                <div class="mt-10 p-6 bg-navy-50 rounded-2xl border border-navy-100">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-navy-700 rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-lock text-white text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-bold text-navy-800">Área do Cliente</h4>
                        </div>
                    </div>
                    <p class="text-gray-500 text-sm mb-4">
                        Acesse sua área para acompanhar seus processos, enviar documentos e muito mais.
                    </p>
                    <a href="/cliente" class="inline-flex items-center gap-2 text-navy-700 font-semibold text-sm hover:text-gold-600 transition-colors">
                        Acessar <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            {{-- Form --}}
            <div class="lg:col-span-3 reveal" style="animation-delay: 0.2s">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 p-8 md:p-10">
                    <livewire:web.contact-form />
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
