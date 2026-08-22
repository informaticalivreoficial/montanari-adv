<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                <i class="fa-solid fa-scale-balanced text-white text-2xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800">Área do Cliente</h2>
            <p class="text-gray-500 mt-1">Acesse para acompanhar seus processos</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form wire:submit.prevent="authenticate">
                {{-- Error Messages --}}
                @error('email')
                    <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-600 text-sm">
                        <i class="fa-solid fa-exclamation-circle mr-1"></i> {{ $message }}
                    </div>
                @enderror

                {{-- Email --}}
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">E-mail</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" wire:model="email" placeholder="seu@email.com"
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Senha</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" wire:model="password" placeholder="Sua senha"
                               class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                </div>

                {{-- Remember --}}
                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" wire:model="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="text-sm text-gray-600">Lembrar-me</span>
                    </label>
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition"
                        wire:loading.attr="disabled" wire:loading.class="opacity-70">
                    <span wire:loading.remove wire:target="authenticate">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i> Entrar
                    </span>
                    <span wire:loading wire:target="authenticate">
                        <i class="fa-solid fa-spinner fa-spin mr-2"></i> Entrando...
                    </span>
                </button>
            </form>
        </div>

        {{-- Footer --}}
        <div class="text-center mt-6">
            <a href="/" class="text-sm text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-arrow-left mr-1"></i> Voltar ao site
            </a>
        </div>
    </div>
</div>
