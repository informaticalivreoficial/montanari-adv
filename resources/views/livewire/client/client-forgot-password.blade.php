<div>
    <div class="mb-8 text-center">
        <a href="/" class="inline-flex items-center justify-center">
            <img
                src="{{ ($configuracoes && method_exists($configuracoes, 'getlogo')) ? $configuracoes->getlogo() : asset('theme/images/image.jpg') }}"
                alt="Montanari Advocacia"
                class="h-12 w-auto">
        </a>
        <h1 class="mt-5 text-2xl font-bold text-white">Recuperar senha</h1>
        <p class="mt-1 text-sm text-slate-400">Informe seu e-mail para receber o link de redefinição.</p>
    </div>

    <div class="rounded-2xl bg-white p-8 shadow-2xl ring-1 ring-black/5">
        @if (session()->has('status'))
            <div class="mb-5 flex items-start gap-2 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                <i class="fa-solid fa-circle-check mt-0.5"></i>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        @error('email')
            <div class="mb-5 flex items-start gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <i class="fa-solid fa-triangle-exclamation mt-0.5"></i>
                <span>{{ $message }}</span>
            </div>
        @enderror

        <form wire:submit.prevent="sendResetLink" novalidate class="space-y-5">
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

            <button type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-70"
                wire:loading.attr="disabled">
                <span wire:loading.remove><i class="fa-solid fa-paper-plane"></i></span>
                <span wire:loading><i class="fa-solid fa-spinner fa-spin"></i></span>
                <span wire:loading.remove>Enviar link</span>
                <span wire:loading>Enviando…</span>
            </button>
        </form>
    </div>

    <p class="mt-6 text-center text-sm text-slate-400">
        <a href="{{ route('client.login') }}" class="inline-flex items-center gap-1.5 font-medium text-slate-300 transition hover:text-white">
            <i class="fa-solid fa-arrow-left"></i> Voltar ao login
        </a>
    </p>
</div>
