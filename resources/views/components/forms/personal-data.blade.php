@props([
    'title' => 'Dados Pessoais',
])

{{--
  Componente: x-forms.personal-data
  Uso:
    <x-forms.personal-data />
    
  Requer no Livewire component:
    public $gender, $cpf, $rg, $rg_expedition, $birthday, $naturalness, $civil_status;
--}}

<x-card title="{{ $title }}" icon="fa-id-card">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        {{-- Gênero --}}
        <div class="space-y-1">
            <label for="gender" class="block text-sm font-medium text-gray-700">Gênero</label>
            <select 
                id="gender"
                wire:model="gender" 
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 
                       shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            >
                <option value="">Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select>
            @error('gender')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- CPF --}}
        <x-input-mask 
            name="cpf" 
            label="CPF" 
            mask-type="cpf" 
            placeholder="000.000.000-00"
            wire:model="cpf"
        />

        {{-- RG --}}
        <x-input 
            name="rg" 
            label="RG" 
            placeholder="Número do RG"
            wire:model="rg"
        />

        {{-- Orgão Expedidor --}}
        <x-input 
            name="rg_expedition" 
            label="Orgão Expedidor" 
            placeholder="Ex: SSP/SP"
            wire:model="rg_expedition"
        />

        {{-- Data de Nascimento --}}
        <x-date-picker 
            name="birthday" 
            label="Data de Nascimento" 
            placeholder="Selecione..."
            max-date="today"
            wire:model.live="birthday"
        />

        {{-- Naturalidade --}}
        <x-input 
            name="naturalness" 
            label="Naturalidade" 
            placeholder="Ex: São Paulo - SP"
            wire:model="naturalness"
        />

        {{-- Estado Civil --}}
        <div class="space-y-1">
            <label for="civil_status" class="block text-sm font-medium text-gray-700">Estado Civil</label>
            <select 
                id="civil_status"
                wire:model="civil_status" 
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 
                       shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            >
                <option value="">Selecione</option>
                <option value="single">Solteiro(a)</option>
                <option value="married">Casado(a)</option>
                <option value="divorced">Divorciado(a)</option>
                <option value="widowed">Viúvo(a)</option>
                <option value="stable_union">União Estável</option>
            </select>
            @error('civil_status')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-card>
