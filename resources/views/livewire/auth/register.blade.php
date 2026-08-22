<div>
    <h2 class="text-2xl font-semibold text-slate-900">Criar sua conta</h2>
    <p class="mt-1 text-sm text-slate-500">Preencha os dados abaixo para se cadastrar.</p>

    <form wire:submit.prevent="register" novalidate class="mt-6 space-y-5">

        <div>
            <label for="name" class="mb-1.5 block text-sm font-medium text-slate-700">Nome completo</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-user"></i>
                </span>
                <input wire:model="name" id="name" type="text" autocomplete="name"
                    class="block w-full rounded-lg border @error('name') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="João da Silva">
            </div>
            @error('name')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="mb-1.5 block text-sm font-medium text-slate-700">E-mail</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <input wire:model="email" id="email" type="email" autocomplete="email"
                    class="block w-full rounded-lg border @error('email') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="voce@exemplo.com.br">
            </div>
            @error('email')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="phone" class="mb-1.5 block text-sm font-medium text-slate-700">Telefone <span class="text-slate-400">(opcional)</span></label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-phone"></i>
                </span>
                <input wire:model="phone" id="phone" type="text" autocomplete="tel"
                    class="block w-full rounded-lg border @error('phone') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="(11) 99999-9999"
                    data-imask="(00) 00000-0000">
            </div>
            @error('phone')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700">Senha</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input wire:model="password" id="password" type="password" autocomplete="new-password"
                    class="block w-full rounded-lg border @error('password') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="Mínimo 8 caracteres">
            </div>
            @error('password')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-slate-700">Confirmar senha</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input wire:model="password_confirmation" id="password_confirmation" type="password" autocomplete="new-password"
                    class="block w-full rounded-lg border border-slate-300 bg-white py-2.5 pl-10 pr-3 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="Repita a senha">
            </div>
        </div>

        <div>
            <label class="flex items-start gap-2 text-sm text-slate-600">
                <input wire:model="accept_terms" type="checkbox"
                    class="mt-0.5 h-4 w-4 rounded border-slate-300 text-amber-600 focus:ring-amber-500">
                <span>
                    Li e aceito os 
                    <a href="#" class="font-medium text-amber-600 hover:text-amber-700">Termos de Uso</a> 
                    e a 
                    <a href="#" class="font-medium text-amber-600 hover:text-amber-700">Política de Privacidade</a>.
                </span>
            </label>
            @error('accept_terms')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-lg bg-amber-500 px-4 py-2.5 text-sm font-semibold text-slate-900 shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
            <span wire:loading.remove><i class="fa-solid fa-user-plus"></i></span>
            <span wire:loading>Criando conta…</span>
            <span wire:loading.remove>Criar conta</span>
        </button>
    </form>

    <p class="mt-6 text-center text-sm text-slate-500">
        Já tem uma conta?
        <a href="{{ route('login') }}" class="font-medium text-amber-600 hover:text-amber-700">Entrar</a>
    </p>
</div>
