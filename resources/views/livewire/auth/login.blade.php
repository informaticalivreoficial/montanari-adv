<div>
    <h2 class="text-2xl font-semibold text-slate-900">Acesse sua conta</h2>
    <p class="mt-1 text-sm text-slate-500">Informe seus dados para entrar no painel.</p>

    @if (session()->has('status'))
        <div class="mt-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="authenticate" novalidate class="mt-6 space-y-5">

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">E-mail</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input wire:model="email" id="email" type="email" autocomplete="email"
                    class="block w-full rounded-lg border @error('email') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="voce@escritorio.com.br">
            </div>
            @error('email')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700">Senha</label>
                <a href="{{ route('password.request') }}" class="text-xs font-medium text-amber-600 hover:text-amber-700">
                    Esqueceu a senha?
                </a>
            </div>
            <div class="relative" x-data="{ show: false }">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input wire:model="password" id="password" type="password" x-bind:type="show ? 'text' : 'password'" autocomplete="current-password"
                    class="block w-full rounded-lg border @error('password') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-10 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="••••••••">
                <button type="button" x-on:click="show = !show" tabindex="-1"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 transition hover:text-slate-600"
                    title="Mostrar/ocultar senha">
                    <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
            </div>
            @error('password')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-600">
            <input wire:model="remember" type="checkbox"
                class="h-4 w-4 rounded border-slate-300 text-amber-600 focus:ring-amber-500">
            Lembrar de mim
        </label>

        <button type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-lg bg-amber-500 px-4 py-2.5 text-sm font-semibold text-slate-900 shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
            <span wire:loading.remove><i class="fa-solid fa-right-to-bracket"></i></span>
            <span wire:loading>Entrando…</span>
            <span wire:loading.remove>Entrar</span>
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-500">
        Não tem uma conta?
        <a href="{{ route('register') }}" class="font-medium text-amber-600 hover:text-amber-700">Cadastre-se</a>
    </p>
</div>
