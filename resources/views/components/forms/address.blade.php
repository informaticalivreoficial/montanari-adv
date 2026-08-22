@props([
    'title' => 'Endereço',
])

{{--
  Componente: x-forms.address
  Uso:
    <x-forms.address />
    
  Requer no Livewire component:
    public $zipcode, $street, $number, $complement, $neighborhood, $state, $city;
    
  ViaCEP: ao completar 8 dígitos no CEP, preenche automaticamente
--}}

<x-card title="{{ $title }}" icon="fa-location-dot">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        {{-- CEP --}}
        <x-input-mask 
            name="zipcode" 
            label="CEP" 
            mask-type="cep" 
            placeholder="00000-000"
            wire:model.live="zipcode"
        />

        {{-- Logradouro --}}
        <div class="sm:col-span-2 lg:col-span-3">
            <x-input 
                name="street" 
                label="Logradouro" 
                placeholder="Rua, Avenida, etc."
                wire:model="street"
            />
        </div>

        {{-- Número --}}
        <x-input 
            name="number" 
            label="Número" 
            placeholder="Nº"
            wire:model="number"
        />

        {{-- Complemento --}}
        <x-input 
            name="complement" 
            label="Complemento" 
            placeholder="Apto, Sala, Bloco"
            wire:model="complement"
        />

        {{-- Bairro --}}
        <x-input 
            name="neighborhood" 
            label="Bairro" 
            placeholder="Bairro"
            wire:model="neighborhood"
        />

        {{-- Cidade --}}
        <x-input 
            name="city" 
            label="Cidade" 
            placeholder="Cidade"
            wire:model="city"
        />

        {{-- Estado --}}
        <div class="space-y-1">
            <label for="state" class="block text-sm font-medium text-gray-700">UF</label>
            <select 
                id="state"
                wire:model="state" 
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 
                       shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            >
                <option value="">UF</option>
                <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option>
                <option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option>
                <option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option>
                <option value="MA">MA</option><option value="MT">MT</option><option value="MS">MS</option>
                <option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option>
                <option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option>
                <option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option>
                <option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option>
                <option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option>
            </select>
            @error('state')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-card>
