@props([
    'required' => false,
    'confirmation' => true,
])

{{--
  Componente: x-forms.password
  Uso:
    <x-forms.password />
    <x-forms.password :required="true" />
    <x-forms.password :confirmation="false" />
    
  Features:
    - Indicador de força com barra colorida (fraca/média/forte)
    - Toggle de visibilidade (olho)
    - Dicas de segurança
--}}

<div x-data="passwordStrength()" class="space-y-4">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        {{-- Senha --}}
        <div class="space-y-1">
            <label for="password" class="block text-sm font-medium text-gray-700">
                Senha @if($required)<span class="text-red-500">*</span>@endif
            </label>
            <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                    <i class="fa-solid fa-lock text-sm"></i>
                </span>
                <input 
                    type="password" 
                    wire:model="password" 
                    id="password"
                    x-ref="passwordInput"
                    @input="checkStrength($refs.passwordInput.value)"
                    class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900 
                           shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                           focus:outline-none transition @error('password') border-red-500 @enderror"
                    placeholder="Mínimo 8 caracteres"
                    autocomplete="new-password"
                >
                <button 
                    type="button" 
                    @click="togglePassword($refs.passwordInput)"
                    class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 transition"
                >
                    <i class="fa-solid text-sm" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                </button>
            </div>
            @error('password')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Confirmar Senha --}}
        @if($confirmation)
            <div class="space-y-1">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                    Confirmar Senha @if($required)<span class="text-red-500">*</span>@endif
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </span>
                    <input 
                        type="password" 
                        wire:model="password_confirmation" 
                        id="password_confirmation"
                        x-ref="confirmInput"
                        class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-10 text-sm text-gray-900 
                               shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                               focus:outline-none transition"
                        placeholder="Repita a senha"
                        autocomplete="new-password"
                    >
                    <button 
                        type="button" 
                        @click="togglePassword($refs.confirmInput)"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 transition"
                    >
                        <i class="fa-solid text-sm" :class="showConfirm ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
                {{-- Indicador de matching --}}
                <template x-if="$refs.confirmInput && $refs.confirmInput.value.length > 0">
                    <div class="flex items-center gap-1.5 mt-1">
                        <i class="fa-solid text-xs" 
                           :class="$refs.passwordInput.value === $refs.confirmInput.value ? 'fa-check-circle text-green-500' : 'fa-times-circle text-red-500'"></i>
                        <span class="text-xs" 
                              :class="$refs.passwordInput.value === $refs.confirmInput.value ? 'text-green-600' : 'text-red-500'"
                              x-text="$refs.passwordInput.value === $refs.confirmInput.value ? 'Senhas coincidem' : 'Senhas não coincidem'">
                        </span>
                    </div>
                </template>
            </div>
        @endif
    </div>

    {{-- Barra de força da senha --}}
    <template x-if="passwordLength > 0">
        <div class="space-y-2">
            <div class="flex gap-1.5">
                <div class="h-1.5 flex-1 rounded-full transition-colors duration-300"
                     :class="strength >= 1 ? (strength === 1 ? 'bg-red-500' : strength === 2 ? 'bg-amber-500' : 'bg-green-500') : 'bg-gray-200'"></div>
                <div class="h-1.5 flex-1 rounded-full transition-colors duration-300"
                     :class="strength >= 2 ? (strength === 2 ? 'bg-amber-500' : 'bg-green-500') : 'bg-gray-200'"></div>
                <div class="h-1.5 flex-1 rounded-full transition-colors duration-300"
                     :class="strength >= 3 ? 'bg-green-500' : 'bg-gray-200'"></div>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-solid text-xs" 
                   :class="strength === 1 ? 'fa-circle-xmark text-red-500' : strength === 2 ? 'fa-circle-exclamation text-amber-500' : 'fa-circle-check text-green-500'"></i>
                <span class="text-xs font-medium"
                      :class="strength === 1 ? 'text-red-500' : strength === 2 ? 'text-amber-600' : 'text-green-600'"
                      x-text="strengthLabel"></span>
            </div>
        </div>
    </template>

    {{-- Dicas --}}
    <x-alert type="info" icon="fa-shield-halved">
        <div class="text-xs">
            <p class="font-medium">Requisitos de segurança:</p>
            <ul class="mt-1 space-y-0.5">
                <li class="flex items-center gap-1.5">
                    <i class="fa-solid text-xs" :class="hasLength ? 'fa-check text-green-500' : 'fa-minus text-gray-400'"></i>
                    No mínimo 8 caracteres
                </li>
                <li class="flex items-center gap-1.5">
                    <i class="fa-solid text-xs" :class="hasUpper ? 'fa-check text-green-500' : 'fa-minus text-gray-400'"></i>
                    Uma letra maiúscula
                </li>
                <li class="flex items-center gap-1.5">
                    <i class="fa-solid text-xs" :class="hasLower ? 'fa-check text-green-500' : 'fa-minus text-gray-400'"></i>
                    Uma letra minúscula
                </li>
                <li class="flex items-center gap-1.5">
                    <i class="fa-solid text-xs" :class="hasNumber ? 'fa-check text-green-500' : 'fa-minus text-gray-400'"></i>
                    Um número
                </li>
                <li class="flex items-center gap-1.5">
                    <i class="fa-solid text-xs" :class="hasSpecial ? 'fa-check text-green-500' : 'fa-minus text-gray-400'"></i>
                    Um caractere especial (!@#$%^&*)
                </li>
            </ul>
        </div>
    </x-alert>
</div>

@once
<script>
function passwordStrength() {
    return {
        showPassword: false,
        showConfirm: false,
        strength: 0,
        strengthLabel: '',
        passwordLength: 0,
        hasLength: false,
        hasUpper: false,
        hasLower: false,
        hasNumber: false,
        hasSpecial: false,

        togglePassword(input) {
            if (input.id === 'password') {
                this.showPassword = !this.showPassword;
            } else {
                this.showConfirm = !this.showConfirm;
            }
            input.type = input.type === 'password' ? 'text' : 'password';
        },

        checkStrength(value) {
            this.passwordLength = value.length;
            this.hasLength = value.length >= 8;
            this.hasUpper = /[A-Z]/.test(value);
            this.hasLower = /[a-z]/.test(value);
            this.hasNumber = /[0-9]/.test(value);
            this.hasSpecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(value);

            let score = 0;
            if (this.hasLength) score++;
            if (this.hasUpper && this.hasLower) score++;
            if (this.hasNumber) score++;
            if (this.hasSpecial) score++;

            if (score <= 1) {
                this.strength = 1;
                this.strengthLabel = 'Senha fraca';
            } else if (score <= 3) {
                this.strength = 2;
                this.strengthLabel = 'Senha média';
            } else {
                this.strength = 3;
                this.strengthLabel = 'Senha forte';
            }

            if (value.length === 0) {
                this.strength = 0;
                this.strengthLabel = '';
            }
        }
    }
}
</script>
@endonce
