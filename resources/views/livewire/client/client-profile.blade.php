<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Meu Perfil</h1>
        <p class="mt-1 text-sm text-gray-500">Visualize suas informações pessoais.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Coluna Principal -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Card de Perfil -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
                <div class="h-32 bg-gradient-to-r from-[#23406C] to-[#112240]"></div>
                <div class="relative px-6 pb-6">
                    <div class="-mt-16 mb-4">
                        @if($user->avatar)
                            <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="h-28 w-28 rounded-2xl border-4 border-white object-cover shadow-lg">
                        @else
                            <div class="flex h-28 w-28 items-center justify-center rounded-2xl border-4 border-white bg-[#23406C] shadow-lg">
                                <span class="text-4xl font-bold text-white">{{ strtoupper(substr($user->name ?? 'C', 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                            <div class="mt-2 flex items-center gap-2">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800">
                                    <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                    Cliente
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 sm:mt-0 flex gap-2">
                            <a href="{{ route('client.profile.edit') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                                <i class="fa-solid fa-pen-to-square text-xs"></i> Editar
                            </a>
                            <a href="{{ route('client.profile.password') }}" class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                                <i class="fa-solid fa-lock text-xs"></i> Senha
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Documentos Pessoais -->
            @if($user->cpf || $user->rg || $user->birthday || $user->civil_status)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-100 px-6 py-4">
                        <h3 class="text-base font-semibold text-gray-900">
                            <i class="fa-solid fa-id-card mr-2 text-[#23406C]"></i>
                            Documentos Pessoais
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            @if($user->cpf)
                                <div class="rounded-lg bg-gray-50 p-3">
                                    <p class="text-xs font-medium text-gray-500">CPF</p>
                                    <p class="text-sm text-gray-900 font-mono">{{ $user->cpf }}</p>
                                </div>
                            @endif
                            @if($user->rg)
                                <div class="rounded-lg bg-gray-50 p-3">
                                    <p class="text-xs font-medium text-gray-500">RG</p>
                                    <p class="text-sm text-gray-900">{{ $user->rg }}{{ $user->rg_expedition ? ' (' . $user->rg_expedition . ')' : '' }}</p>
                                </div>
                            @endif
                            @if($user->birthday)
                                <div class="rounded-lg bg-gray-50 p-3">
                                    <p class="text-xs font-medium text-gray-500">Data de Nascimento</p>
                                    <p class="text-sm text-gray-900">{{ $user->birthday }}</p>
                                </div>
                            @endif
                            @if($user->gender)
                                <div class="rounded-lg bg-gray-50 p-3">
                                    <p class="text-xs font-medium text-gray-500">Gênero</p>
                                    <p class="text-sm text-gray-900">{{ match($user->gender) { 'male' => 'Masculino', 'female' => 'Feminino', 'other' => 'Outro', default => '-' } }}</p>
                                </div>
                            @endif
                            @if($user->naturalness)
                                <div class="rounded-lg bg-gray-50 p-3">
                                    <p class="text-xs font-medium text-gray-500">Naturalidade</p>
                                    <p class="text-sm text-gray-900">{{ $user->naturalness }}</p>
                                </div>
                            @endif
                            @if($user->civil_status)
                                <div class="rounded-lg bg-gray-50 p-3">
                                    <p class="text-xs font-medium text-gray-500">Estado Civil</p>
                                    <p class="text-sm text-gray-900">{{ match($user->civil_status) { 'single' => 'Solteiro(a)', 'married' => 'Casado(a)', 'divorced' => 'Divorciado(a)', 'widowed' => 'Viúvo(a)', 'stable_union' => 'União Estável', default => '-' } }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Informações de Contato -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        <i class="fa-solid fa-address-card mr-2 text-[#23406C]"></i>
                        Contato
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#23406C]/10 text-[#23406C]">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">E-mail</p>
                                <p class="text-sm text-gray-900">{{ $user->email }}</p>
                            </div>
                        </div>
                        @if($user->additional_email)
                            <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-purple-600">
                                    <i class="fa-solid fa-envelope-open text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-500">E-mail Alternativo</p>
                                    <p class="text-sm text-gray-900">{{ $user->additional_email }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">Telefone</p>
                                <p class="text-sm text-gray-900">{{ $user->phone ?: '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                <i class="fa-solid fa-mobile-screen text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">Celular</p>
                                <p class="text-sm text-gray-900">{{ $user->cell_phone ?: '-' }}</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                                <i class="fa-brands fa-whatsapp text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">WhatsApp</p>
                                <p class="text-sm text-gray-900">{{ $user->whatsapp ?: '-' }}</p>
                            </div>
                        </div>
                        @if($user->telegram)
                            <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-sky-100 text-sky-600">
                                    <i class="fa-brands fa-telegram text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-500">Telegram</p>
                                    <p class="text-sm text-gray-900">{{ $user->telegram }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Endereço -->
            @if($user->street || $user->city)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-100 px-6 py-4">
                        <h3 class="text-base font-semibold text-gray-900">
                            <i class="fa-solid fa-location-dot mr-2 text-[#23406C]"></i>
                            Endereço
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="rounded-lg bg-gray-50 p-3">
                                <p class="text-xs font-medium text-gray-500">CEP</p>
                                <p class="text-sm text-gray-900">{{ $user->zipcode ?: '-' }}</p>
                            </div>
                            <div class="rounded-lg bg-gray-50 p-3">
                                <p class="text-xs font-medium text-gray-500">Logradouro</p>
                                <p class="text-sm text-gray-900">{{ $user->street ?: '-' }}{{ $user->number ? ', ' . $user->number : '' }}</p>
                            </div>
                            <div class="rounded-lg bg-gray-50 p-3">
                                <p class="text-xs font-medium text-gray-500">Bairro</p>
                                <p class="text-sm text-gray-900">{{ $user->neighborhood ?: '-' }}</p>
                            </div>
                            <div class="rounded-lg bg-gray-50 p-3">
                                <p class="text-xs font-medium text-gray-500">Cidade / UF</p>
                                <p class="text-sm text-gray-900">{{ $user->city ?: '-' }}{{ $user->state ? ' - ' . $user->state : '' }}</p>
                            </div>
                            @if($user->complement)
                                <div class="rounded-lg bg-gray-50 p-3 sm:col-span-2">
                                    <p class="text-xs font-medium text-gray-500">Complemento</p>
                                    <p class="text-sm text-gray-900">{{ $user->complement }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Redes Sociais -->
            @if($user->facebook || $user->instagram || $user->twitter || $user->linkedin)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-100 px-6 py-4">
                        <h3 class="text-base font-semibold text-gray-900">
                            <i class="fa-solid fa-share-nodes mr-2 text-[#23406C]"></i>
                            Redes Sociais
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="flex flex-wrap gap-3">
                            @if($user->facebook)
                                <a href="{{ $user->facebook }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-blue-50 hover:border-blue-200 hover:text-blue-600">
                                    <i class="fa-brands fa-facebook"></i> Facebook
                                </a>
                            @endif
                            @if($user->instagram)
                                <a href="{{ $user->instagram }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-pink-50 hover:border-pink-200 hover:text-pink-600">
                                    <i class="fa-brands fa-instagram"></i> Instagram
                                </a>
                            @endif
                            @if($user->twitter)
                                <a href="{{ $user->twitter }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-sky-50 hover:border-sky-200 hover:text-sky-500">
                                    <i class="fa-brands fa-twitter"></i> Twitter / X
                                </a>
                            @endif
                            @if($user->linkedin)
                                <a href="{{ $user->linkedin }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-blue-50 hover:border-blue-200 hover:text-blue-700">
                                    <i class="fa-brands fa-linkedin"></i> LinkedIn
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Coluna Lateral -->
        <div class="space-y-6">
            <!-- Ações Rápidas -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        <i class="fa-solid fa-bolt mr-2 text-[#23406C]"></i>
                        Ações Rápidas
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    <a href="{{ route('client.dashboard') }}" class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:border-[#23406C]/30 hover:bg-[#23406C]/5">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#23406C]/10 text-[#23406C]">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Dashboard</p>
                            <p class="text-xs text-gray-500">Visão geral</p>
                        </div>
                    </a>
                    <a href="{{ route('client.processes') }}" class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:border-[#23406C]/30 hover:bg-[#23406C]/5">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#23406C]/10 text-[#23406C]">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Meus Processos</p>
                            <p class="text-xs text-gray-500">Acompanhar andamento</p>
                        </div>
                    </a>
                    <a href="{{ route('client.messages') }}" class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:border-[#23406C]/30 hover:bg-[#23406C]/5">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#23406C]/10 text-[#23406C]">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Mensagens</p>
                            <p class="text-xs text-gray-500">Falar com o escritório</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
