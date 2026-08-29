<div>
    <h2 class="text-2xl font-semibold text-slate-900">Redefinir senha</h2>
    <p class="mt-1 text-sm text-slate-500">Crie uma nova senha para a sua conta.</p>

    @if($resetDone)
        <div class="mt-6 rounded-lg border border-emerald-200 bg-emerald-50 px-5 py-6 text-center">
            <i class="fa-solid fa-circle-check text-3xl text-emerald-500"></i>
            <p class="mt-2 text-sm font-medium text-emerald-700">{{ $successMessage }}</p>
            <a href="{{ route('login') }}"
               class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-lg bg-amber-500 px-4 py-2.5 text-sm font-semibold text-slate-900 shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                <i class="fa-solid fa-right-to-bracket"></i> Fazer login
            </a>
        </div>
    @else
        @if (session()->has('status'))
            <div class="mt-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                <i class="fa-solid fa-circle-check mr-1"></i> {{ session('status') }}
            </div>
        @endif

        <form wire:submit.prevent="resetPassword" novalidate class="mt-6 space-y-5">

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

        <div x-data="{ show: false, score: 0, label: 'Informe uma senha', bar: 'bg-slate-200', text: 'text-slate-400',
                check(v) {
                    if (!v) { this.score = 0; this.label = 'Informe uma senha'; this.bar = 'bg-slate-200'; this.text = 'text-slate-400'; return; }
                    let s = 0;
                    if (v.length >= 8) s++;
                    if (/[a-z]/.test(v)) s++;
                    if (/[A-Z]/.test(v)) s++;
                    if (/\d/.test(v)) s++;
                    if (/[^A-Za-z0-9]/.test(v)) s++;
                    this.score = s;
                    if (s <= 2) { this.label = 'Fraca'; this.bar = 'bg-red-500'; this.text = 'text-red-600'; }
                    else if (s <= 4) { this.label = 'Média'; this.bar = 'bg-amber-500'; this.text = 'text-amber-600'; }
                    else { this.label = 'Forte'; this.bar = 'bg-green-500'; this.text = 'text-green-600'; }
                } }" x-init="$nextTick(() => check($refs.pw.value))">
            <label for="password" class="mb-1.5 block text-sm font-medium text-slate-700">Nova senha</label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input x-ref="pw" wire:model="password" id="password" type="password" x-bind:type="show ? 'text' : 'password'"
                    x-on:input="check($event.target.value)" autocomplete="new-password"
                    class="block w-full rounded-lg border @error('password') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-10 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="Mínimo de 8 caracteres">
                <button type="button" x-on:click="show = !show" tabindex="-1"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 transition hover:text-slate-600"
                    title="Mostrar/ocultar senha">
                    <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
            </div>
            <!-- Medidor de força da senha -->
            <div class="mt-2">
                <div class="h-1.5 w-full overflow-hidden rounded-full bg-slate-200">
                    <div class="h-1.5 rounded-full transition-all duration-300" :class="bar" :style="'width:' + (score * 20) + '%'"></div>
                </div>
                <p class="mt-1 text-xs font-medium" :class="text" x-text="label"></p>
            </div>
            @error('password')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="mb-1.5 block text-sm font-medium text-slate-700">Confirmar senha</label>
            <div class="relative" x-data="{ show: false }">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                    <i class="fa-solid fa-lock"></i>
                </span>
                <input wire:model="password_confirmation" id="password_confirmation" type="password" x-bind:type="show ? 'text' : 'password'" autocomplete="new-password"
                    class="block w-full rounded-lg border @error('password_confirmation') border-red-400 @else border-slate-300 @enderror bg-white py-2.5 pl-10 pr-10 text-sm text-slate-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/40"
                    placeholder="Repita a nova senha">
                <button type="button" x-on:click="show = !show" tabindex="-1"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 transition hover:text-slate-600"
                    title="Mostrar/ocultar senha">
                    <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
            </div>
            @error('password_confirmation')
                <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-lg bg-amber-500 px-4 py-2.5 text-sm font-semibold text-slate-900 shadow-sm transition hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
            <span wire:loading.remove><i class="fa-solid fa-check"></i></span>
            <span wire:loading>Redefinindo…</span>
            <span wire:loading.remove>Redefinir senha</span>
        </button>

        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 text-sm font-medium text-slate-500 hover:text-slate-700">
            <i class="fa-solid fa-arrow-left"></i> Voltar ao login
        </a>
    </form>
    @endif
</div>
