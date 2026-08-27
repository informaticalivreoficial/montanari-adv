<div x-data="{ activeTab: 'info' }">
    <!-- Header -->
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Configurações do Sistema</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie todas as informações do sistema em um só lugar.</p>
        </div>
        <button
            type="button"
            wire:click="update"
            wire:loading.attr="disabled"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-semibold
                   text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2
                   focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50"
        >
            <i class="fa-solid fa-floppy-disk text-xs"></i>
            <span wire:loading.remove wire:target="update">Salvar Alterações</span>
            <span wire:loading wire:target="update">Salvando...</span>
        </button>
    </div>

    <!-- Tabs Navigation -->
    <div class="mb-6 overflow-x-auto rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="flex border-b border-gray-200">
            <button
                @click="activeTab = 'info'"
                :class="activeTab === 'info' ? 'border-amber-500 text-amber-700 bg-amber-50/50' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="flex items-center gap-2 whitespace-nowrap border-b-2 px-5 py-3.5 text-sm font-medium transition"
            >
                <i class="fa-solid fa-circle-info text-xs"></i>
                Informações
            </button>
            <button
                @click="activeTab = 'contact'"
                :class="activeTab === 'contact' ? 'border-amber-500 text-amber-700 bg-amber-50/50' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="flex items-center gap-2 whitespace-nowrap border-b-2 px-5 py-3.5 text-sm font-medium transition"
            >
                <i class="fa-solid fa-phone text-xs"></i>
                Contato
            </button>
            <button
                @click="activeTab = 'address'"
                :class="activeTab === 'address' ? 'border-amber-500 text-amber-700 bg-amber-50/50' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="flex items-center gap-2 whitespace-nowrap border-b-2 px-5 py-3.5 text-sm font-medium transition"
            >
                <i class="fa-solid fa-location-dot text-xs"></i>
                Endereço
            </button>
            <button
                @click="activeTab = 'social'"
                :class="activeTab === 'social' ? 'border-amber-500 text-amber-700 bg-amber-50/50' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="flex items-center gap-2 whitespace-nowrap border-b-2 px-5 py-3.5 text-sm font-medium transition"
            >
                <i class="fa-solid fa-share-nodes text-xs"></i>
                Redes Sociais
            </button>
            <button
                @click="activeTab = 'images'"
                :class="activeTab === 'images' ? 'border-amber-500 text-amber-700 bg-amber-50/50' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="flex items-center gap-2 whitespace-nowrap border-b-2 px-5 py-3.5 text-sm font-medium transition"
            >
                <i class="fa-solid fa-image text-xs"></i>
                Imagens
            </button>
            <button
                @click="activeTab = 'seo'"
                :class="activeTab === 'seo' ? 'border-amber-500 text-amber-700 bg-amber-50/50' : 'border-transparent text-gray-500 hover:text-gray-700'"
                class="flex items-center gap-2 whitespace-nowrap border-b-2 px-5 py-3.5 text-sm font-medium transition"
            >
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
                SEO & Legal
            </button>
        </div>
    </div>

    <!-- ======================== TAB: INFORMAÇÕES ======================== -->
    <div x-show="activeTab === 'info'" x-transition>
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100">
                    <i class="fa-solid fa-circle-info text-amber-600"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Informações Gerais</h3>
                    <p class="text-xs text-gray-500">Dados principais do sistema e identidade visual.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <x-input name="app_name" label="Nome do Site" wire:model="app_name" required placeholder="Ex: Montanari Adv" />
                <x-input name="social_name" label="Nome Social / Fantasia" wire:model="social_name" placeholder="Ex: Montanari Advocacia" />
                <x-input name="alias_name" label="Nome Alternativo" wire:model="alias_name" placeholder="Ex: MA" />
                <x-input name="slug" label="Slug" wire:model="slug" placeholder="Ex: montanari-adv" />

                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Ano de Início</label>
                    <input
                        type="number"
                        wire:model="init_date"
                        min="1900"
                        max="{{ date('Y') }}"
                        placeholder="{{ date('Y') }}"
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition
                               focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    />
                    @error('init_date') <p class="flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                </div>

                <x-input name="template" label="Template" wire:model="template" placeholder="Ex: default" />

                <x-input-mask name="cnpj" label="CNPJ" mask-type="cnpj" wire:model="cnpj" placeholder="00.000.000/0000-00" />
                <x-input name="ie" label="Inscrição Estadual" wire:model="ie" placeholder="Ex: 123456789" />
                <x-input name="domain" label="Domínio" wire:model="domain" placeholder="Ex: montanariadv.com.br" />
                <x-input name="subdomain" label="Subdomínio" wire:model="subdomain" placeholder="Ex: www" />

                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700">Status do Sistema</label>
                    <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-4 py-2.5">
                        <label class="relative inline-flex cursor-pointer items-center">
                            <input type="checkbox" wire:model="status" class="peer sr-only" value="1" />
                            <div class="h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all peer-checked:bg-amber-500 peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                        </label>
                        <span class="text-sm text-gray-600" x-text="status ? 'Ativo' : 'Inativo'"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================== TAB: CONTATO ======================== -->
    <div x-show="activeTab === 'contact'" x-transition>
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100">
                    <i class="fa-solid fa-phone text-blue-600"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Informações de Contato</h3>
                    <p class="text-xs text-gray-500">Telefones, e-mails e canais de comunicação.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <x-input-mask name="phone" label="Telefone" mask-type="phone" wire:model="phone" placeholder="(00) 0000-0000" />
                <x-input-mask name="cell_phone" label="Celular" mask-type="phone" wire:model="cell_phone" placeholder="(00) 00000-0000" />
                <x-input-mask name="whatsapp" label="WhatsApp" mask-type="phone" wire:model="whatsapp" placeholder="(00) 00000-0000" />
                <x-input name="telegram" label="Telegram" wire:model="telegram" placeholder="@usuario" />
                <x-input name="email" label="E-mail Principal" type="email" wire:model="email" placeholder="contato@exemplo.com" />
                <x-input name="additional_email" label="E-mail Adicional" type="email" wire:model="additional_email" placeholder="outro@exemplo.com" />
            </div>
        </div>
    </div>

    <!-- ======================== TAB: ENDEREÇO ======================== -->
    <div x-show="activeTab === 'address'" x-transition>
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100">
                    <i class="fa-solid fa-location-dot text-emerald-600"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Endereço</h3>
                    <p class="text-xs text-gray-500">Endereço físico do escritório/empresa.</p>
                </div>
            </div>

            <!-- Toggle: exibir endereço no site -->
            <div class="mb-5 flex items-center gap-3 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3">
                <label class="relative inline-flex cursor-pointer items-center">
                    <input type="checkbox" wire:model="display_address" class="peer sr-only" value="1" />
                    <div class="h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all peer-checked:bg-amber-500 peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                </label>
                <div>
                    <span class="text-sm font-medium text-gray-700">Exibir endereço no site</span>
                    <p class="text-xs text-gray-500">Mostra o endereço completo para os visitantes.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div class="sm:col-span-1">
                    <x-input-mask name="zipcode" label="CEP" mask-type="cep" wire:model.live="zipcode" placeholder="00000-000" />
                </div>
                <div class="sm:col-span-2">
                    <x-input name="street" label="Logradouro" wire:model="street" placeholder="Rua, Avenida, etc." />
                </div>
                <x-input name="number" label="Número" wire:model="number" placeholder="123" />
                <x-input name="complement" label="Complemento" wire:model="complement" placeholder="Sala 101, Bloco A" />
                <x-input name="neighborhood" label="Bairro" wire:model="neighborhood" placeholder="Centro" />
                <x-input name="city" label="Cidade" wire:model="city" placeholder="São Paulo" />
                <x-input name="state" label="UF" wire:model="state" placeholder="SP" class="uppercase" />
            </div>
        </div>
    </div>

    <!-- ======================== TAB: REDES SOCIAIS ======================== -->
    <div x-show="activeTab === 'social'" x-transition>
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100">
                    <i class="fa-solid fa-share-nodes text-purple-600"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Redes Sociais</h3>
                    <p class="text-xs text-gray-500">Links para as redes sociais do escritório.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div class="flex items-start gap-3">
                    <div class="mt-8 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-600">
                        <i class="fa-brands fa-facebook-f text-sm text-white"></i>
                    </div>
                    <div class="flex-1">
                        <x-input name="facebook" label="Facebook" wire:model="facebook" placeholder="https://facebook.com/..." />
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-8 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-sky-500">
                        <i class="fa-brands fa-twitter text-sm text-white"></i>
                    </div>
                    <div class="flex-1">
                        <x-input name="twitter" label="Twitter / X" wire:model="twitter" placeholder="https://twitter.com/..." />
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-8 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-gradient-to-br from-purple-500 via-pink-500 to-orange-400">
                        <i class="fa-brands fa-instagram text-sm text-white"></i>
                    </div>
                    <div class="flex-1">
                        <x-input name="instagram" label="Instagram" wire:model="instagram" placeholder="https://instagram.com/..." />
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="mt-8 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-red-600">
                        <i class="fa-brands fa-youtube text-sm text-white"></i>
                    </div>
                    <div class="flex-1">
                        <x-input name="youtube" label="YouTube" wire:model="youtube" placeholder="https://youtube.com/..." />
                    </div>
                </div>
                <div class="flex items-start gap-3 sm:col-span-2">
                    <div class="mt-8 flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-blue-700">
                        <i class="fa-brands fa-linkedin-in text-sm text-white"></i>
                    </div>
                    <div class="flex-1">
                        <x-input name="linkedin" label="LinkedIn" wire:model="linkedin" placeholder="https://linkedin.com/..." />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================== TAB: IMAGENS ======================== -->
    <div x-show="activeTab === 'images'" x-transition>
        <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-pink-100">
                    <i class="fa-solid fa-image text-pink-600"></i>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-gray-900">Imagens do Sistema</h3>
                    <p class="text-xs text-gray-500">Logos, favicon e imagens de capa. Todas salvas em WebP.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                {{-- Logo Principal --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Logo Principal</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center" x-data="{ preview: null }">
                            @if($logo)
                                <img src="{{ $logo->temporaryUrl() }}" class="h-full w-full object-contain p-2" />
                            @elseif($config && $config->logo)
                                <img src="{{ $config->getlogo() }}" class="h-full w-full object-contain p-2" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-image text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Logo principal</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="logo"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('logo') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">Recomendado: 300x80px</p>
                </div>

                {{-- Logo Admin --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Logo Admin</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center">
                            @if($logo_admin)
                                <img src="{{ $logo_admin->temporaryUrl() }}" class="h-full w-full object-contain p-2" />
                            @elseif($config && $config->logo_admin)
                                <img src="{{ $config->getlogoadmin() }}" class="h-full w-full object-contain p-2" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-image text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Logo do painel</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="logo_admin"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('logo_admin') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">Exibido na sidebar do admin</p>
                </div>

                {{-- Logo Footer --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Logo Footer</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center">
                            @if($logo_footer)
                                <img src="{{ $logo_footer->temporaryUrl() }}" class="h-full w-full object-contain p-2" />
                            @elseif($config && $config->logo_footer)
                                <img src="{{ $config->getlogofooter() }}" class="h-full w-full object-contain p-2" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-image text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Logo do rodapé</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="logo_footer"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('logo_footer') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">Exibido no rodapé do site</p>
                </div>

                {{-- Favicon --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Favicon</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center">
                            @if($favicon)
                                <img src="{{ $favicon->temporaryUrl() }}" class="h-16 w-16 object-contain" />
                            @elseif($config && $config->favicon)
                                <img src="{{ $config->getfaveicon() }}" class="h-16 w-16 object-contain" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-tab text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Favicon</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="favicon"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('favicon') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">Ícone da aba do navegador</p>
                </div>

                {{-- Meta Image --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Imagem Meta (OG Image)</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center">
                            @if($metaimg)
                                <img src="{{ $metaimg->temporaryUrl() }}" class="h-full w-full object-cover" />
                            @elseif($config && $config->metaimg)
                                <img src="{{ $config->getmetaimg() }}" class="h-full w-full object-cover" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-share text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Imagem de compartilhamento</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="metaimg"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('metaimg') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">1200x630px para redes sociais</p>
                </div>

                {{-- Header Image --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Imagem de Capa</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center">
                            @if($imgheader)
                                <img src="{{ $imgheader->temporaryUrl() }}" class="h-full w-full object-cover" />
                            @elseif($config && $config->imgheader)
                                <img src="{{ $config->getheadersite() }}" class="h-full w-full object-cover" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-panorama text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Banner / Capa</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="imgheader"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('imgheader') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">Banner do cabeçalho do site</p>
                </div>

                {{-- Watermark --}}
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700">Marca d'Água</label>
                    <div class="group relative overflow-hidden rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 transition hover:border-amber-400">
                        <div class="flex h-36 items-center justify-center">
                            @if($watermark)
                                <img src="{{ $watermark->temporaryUrl() }}" class="h-24 w-24 object-contain opacity-60" />
                            @elseif($config && $config->watermark)
                                <img src="{{ $config->getwatermark() }}" class="h-24 w-24 object-contain opacity-60" />
                            @else
                                <div class="text-center">
                                    <i class="fa-solid fa-droplet text-3xl text-gray-300"></i>
                                    <p class="mt-1 text-xs text-gray-400">Marca d'água</p>
                                </div>
                            @endif
                        </div>
                        <input type="file" accept="image/*" wire:model="watermark"
                               class="absolute inset-0 cursor-pointer opacity-0" />
                    </div>
                    @error('watermark') <p class="mt-1 flex items-center gap-1 text-xs text-red-500"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</p> @enderror
                    <p class="mt-1 text-xs text-gray-400">PNG com transparência</p>
                </div>
            </div>

            <div class="mt-4 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-circle-info mt-0.5 text-sm text-amber-600"></i>
                    <p class="text-xs text-amber-700">
                        Todas as imagens são automaticamente convertidas para <strong>WebP</strong> (85% de qualidade) ao salvar,
                        reduzindo o tamanho dos arquivos em até 50%.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================== TAB: SEO & LEGAL ======================== -->
    <div x-show="activeTab === 'seo'" x-transition>
        <div class="space-y-6">
            {{-- SEO --}}
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-100">
                        <i class="fa-solid fa-magnifying-glass text-indigo-600"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">SEO & Analytics</h3>
                        <p class="text-xs text-gray-500">Otimização para mecanismos de busca.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <x-input name="analytics_id" label="Google Analytics ID" wire:model="analytics_id" placeholder="G-XXXXXXXXXX" />
                    <x-tags name="metatags" label="Metatags (palavras-chave)" wire:model="metatags" placeholder="Digite uma tag e pressione Enter..." />
                </div>

                <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700">Google Maps Embed URL</label>
                        <textarea
                            wire:model="maps_google"
                            rows="2"
                            placeholder="https://www.google.com/maps/embed?..."
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition
                                   focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                        ></textarea>
                    </div>
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-700">Feeds & Mapa do Site</label>
                        <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-4 py-3">
                            <label class="relative inline-flex cursor-pointer items-center">
                                <input type="checkbox" wire:model="rss" class="peer sr-only" value="1" />
                                <div class="h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all peer-checked:bg-amber-500 peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                            </label>
                            <span class="text-sm text-gray-700">Ativar RSS Feed</span>
                        </div>
                        <div class="flex items-center gap-3 rounded-lg border border-gray-200 px-4 py-3">
                            <label class="relative inline-flex cursor-pointer items-center">
                                <input type="checkbox" wire:model="sitemap" class="peer sr-only" value="1" />
                                <div class="h-6 w-11 rounded-full bg-gray-200 after:absolute after:left-[2px] after:top-[2px] after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all peer-checked:bg-amber-500 peer-checked:after:translate-x-full peer-checked:after:border-white"></div>
                            </label>
                            <span class="text-sm text-gray-700">Gerar Sitemap automaticamente</span>
                        </div>
                    </div>
                </div>

               
            </div>

            {{-- Políticas Legais --}}
            <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">
                <div class="mb-5 flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-100">
                        <i class="fa-solid fa-scale-balanced text-red-600"></i>
                    </div>
                    <div>
                        <h3 class="text-base font-semibold text-gray-900">Políticas & Termos Legais</h3>
                        <p class="text-xs text-gray-500">Textos de uso obrigatório para conformidade legal.</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <x-quill name="privacy_policy" label="Política de Privacidade" wire:model="privacy_policy" placeholder="Texto da política de privacidade..." />

                    <x-quill name="terms_conditions" label="Termos e Condições" wire:model="terms_conditions" placeholder="Texto dos termos e condições de uso..." />

                    <x-quill name="cookies_preference" label="Preferência de Cookies" wire:model="cookies_preference" placeholder="Política de uso de cookies..." />

                    <x-quill name="information" label="Informações Adicionais" wire:model="information" placeholder="Informações gerais sobre o escritório..." />
                </div>
            </div>
        </div>
    </div>
</div>
