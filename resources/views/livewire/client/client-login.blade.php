<div>
    {{-- Marca --}}
    <div class="mb-8 text-center">
        <a href="/" class="inline-flex items-center justify-center" aria-label="Voltar ao site">
            <img
                src="{{ ($configuracoes && method_exists($configuracoes, 'getlogo')) ? $configuracoes->getlogofooter() : asset('theme/images/image.jpg') }}"
                alt="Montanari Advocacia"
                class="h-12 w-auto">
        </a>
        <h1 class="mt-5 text-2xl font-bold text-white">Área do Cliente</h1>
        <p class="mt-1 text-sm text-slate-400">Acesse para acompanhar seus processos, prazos e documentos.</p>
    </div>

    {{-- Card --}}
    <div class="rounded-2xl bg-white p-8 shadow-2xl ring-1 ring-black/5">

        {{-- Estado: Link enviado com sucesso --}}
        @if($linkSent)
            <div class="text-center">
                <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-emerald-100">
                    <i class="fa-solid fa-envelope-open-text text-2xl text-emerald-600"></i>
                </div>
                <h2 class="text-lg font-bold text-slate-900">Link enviado!</h2>
                <p class="mt-2 text-sm text-slate-500">
                    Se o e-mail <strong>{{ $email }}</strong> estiver cadastrado na área de clientes,
                    você receberá um link de acesso em breve.
                </p>
                <p class="mt-1 text-xs text-slate-400">
                    Não encontrou? Verifique a pasta de spam ou tente novamente.
                </p>

                <button wire:click="backToForm"
                    class="mt-6 inline-flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-700 transition">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    Usar outro e-mail
                </button>
            </div>

        {{-- Estado: Formulário --}}
        @else
            {{-- Erro geral --}}
            @error('general')
                <div class="mb-5 flex items-start gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <i class="fa-solid fa-triangle-exclamation mt-0.5"></i>
                    <span>{{ $message }}</span>
                </div>
            @enderror

            <form wire:submit.prevent="sendLink" novalidate class="space-y-5">
                {{-- Instrução --}}
                <div class="rounded-lg bg-blue-50 border border-blue-100 px-4 py-3">
                    <div class="flex items-start gap-2">
                        <i class="fa-solid fa-circle-info mt-0.5 text-sm text-blue-600"></i>
                        <p class="text-xs text-blue-700">
                            Informe seu e-mail e enviaremos um <strong>link seguro de acesso</strong> para a sua caixa de entrada.
                            O link expira em 15 minutos.
                        </p>
                    </div>
                </div>

                {{-- E-mail --}}
                <div>
                    <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">E-mail</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input wire:model="email" id="email" type="email" autocomplete="email"
                            class="block w-full rounded-lg border @error('email') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/40"
                            placeholder="seu@email.com">
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Enviar --}}
                <button type="submit"
                    class="flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-70"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove><i class="fa-solid fa-paper-plane"></i></span>
                    <span wire:loading><i class="fa-solid fa-spinner fa-spin"></i></span>
                    <span wire:loading.remove>Enviar Link de Acesso</span>
                    <span wire:loading>Enviando…</span>
                </button>
            </form>
        @endif
    </div>

    {{-- Rodapé --}}
    <p class="mt-6 text-center text-sm text-slate-400">
        <a href="/" class="inline-flex items-center gap-1.5 font-medium text-slate-300 transition hover:text-white">
            <i class="fa-solid fa-arrow-left"></i> Voltar ao site
        </a>
    </p>
</div>
