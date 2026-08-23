<div>
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 mb-1">
            <a href="{{ route('client.profile') }}" class="text-gray-400 hover:text-gray-600 transition">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Alterar Senha</h1>
        </div>
        <p class="mt-1 text-sm text-gray-500 ml-9">Atualize sua senha de acesso.</p>
    </div>

    <div class="max-w-lg">
        <form wire:submit.prevent="updatePassword" class="space-y-6">
            <!-- Senha -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                <h3 class="text-base font-semibold text-gray-900 mb-4">
                    <i class="fa-solid fa-lock mr-2 text-[#23406C]"></i>
                    Alterar Senha
                </h3>
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Senha Atual *</label>
                    <div class="relative" x-data="{ show: false }">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </span>
                        <input
                            x-show="!show"
                            wire:model="current_password"
                            type="password"
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900
                                   shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                   focus:outline-none transition @error('current_password') border-red-500 @enderror"
                            placeholder="Digite sua senha atual"
                            autocomplete="current-password"
                        >
                        <input
                            x-show="show"
                            wire:model="current_password"
                            type="text"
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900
                                   shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                   focus:outline-none transition @error('current_password') border-red-500 @enderror"
                            placeholder="Digite sua senha atual"
                            autocomplete="current-password"
                        >
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 transition hover:text-[#23406C]"
                            :aria-label="show ? 'Ocultar senha' : 'Mostrar senha'">
                            <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                        @error('current_password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Nova Senha *</label>
                    <div class="relative" x-data="{ show: false }">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-key text-sm"></i>
                        </span>
                        <input
                            x-show="!show"
                            wire:model="new_password"
                            type="password"
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900
                                   shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                   focus:outline-none transition @error('new_password') border-red-500 @enderror"
                            placeholder="Mínimo 8 caracteres"
                            autocomplete="new-password"
                        >
                        <input
                            x-show="show"
                            wire:model="new_password"
                            type="text"
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900
                                   shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                   focus:outline-none transition @error('new_password') border-red-500 @enderror"
                            placeholder="Mínimo 8 caracteres"
                            autocomplete="new-password"
                        >
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 transition hover:text-[#23406C]"
                            :aria-label="show ? 'Ocultar senha' : 'Mostrar senha'">
                            <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                        @error('new_password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Confirmar Nova Senha *</label>
                    <div class="relative" x-data="{ show: false }">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-key text-sm"></i>
                        </span>
                        <input
                            x-show="!show"
                            wire:model="new_password_confirmation"
                            type="password"
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900
                                   shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                   focus:outline-none transition"
                            placeholder="Repita a nova senha"
                            autocomplete="new-password"
                        >
                        <input
                            x-show="show"
                            wire:model="new_password_confirmation"
                            type="text"
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900
                                   shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                   focus:outline-none transition"
                            placeholder="Repita a nova senha"
                            autocomplete="new-password"
                        >
                        <button type="button" @click="show = !show"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 transition hover:text-[#23406C]"
                            :aria-label="show ? 'Ocultar senha' : 'Mostrar senha'">
                            <i class="fa-solid" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Dicas de segurança -->
                <div class="mt-6 rounded-lg bg-blue-50 border border-blue-200 p-4">
                    <div class="flex items-start gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600 flex-shrink-0">
                            <i class="fa-solid fa-shield-halved text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-blue-800">Dicas de segurança</p>
                            <ul class="mt-1 text-xs text-blue-700 space-y-1">
                                <li>• Use no mínimo 8 caracteres</li>
                                <li>• Combine letras, números e símbolos</li>
                                <li>• Evite usar informações pessoais</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end gap-3">
                <a
                    href="{{ route('client.profile') }}"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5
                           text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                >
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                    Cancelar
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-lg bg-[#23406C] px-6 py-2.5 text-sm font-semibold
                           text-white shadow-sm transition hover:bg-[#112240] focus:outline-none focus:ring-2
                           focus:ring-[#23406C] focus:ring-offset-2"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-50 cursor-not-allowed"
                >
                    <i class="fa-solid fa-lock text-xs"></i>
                    <span wire:loading.remove>Alterar Senha</span>
                    <span wire:loading>Salvando...</span>
                </button>
            </div>
        </form>
    </div>
</div>
