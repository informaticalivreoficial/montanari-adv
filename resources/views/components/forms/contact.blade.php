@props([
    'title' => 'Contato',
])

{{--
  Componente: x-forms.contact
  Uso:
    <x-forms.contact />
    
  Requer no Livewire component:
    public $phone, $cell_phone, $whatsapp, $telegram, $additional_email;
--}}

<x-card title="{{ $title }}" icon="fa-phone">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        {{-- Telefone --}}
        <x-input-mask 
            name="phone" 
            label="Telefone" 
            mask-type="phone" 
            placeholder="(00) 0000-0000"
            wire:model="phone"
        />

        {{-- Celular --}}
        <x-input-mask 
            name="cell_phone" 
            label="Celular" 
            mask-type="phone" 
            placeholder="(00) 00000-0000"
            wire:model="cell_phone"
        />

        {{-- WhatsApp --}}
        <x-input-mask 
            name="whatsapp" 
            label="WhatsApp" 
            mask-type="phone" 
            placeholder="(00) 00000-0000"
            wire:model="whatsapp"
        />

        {{-- Telegram --}}
        <x-input 
            name="telegram" 
            label="Telegram" 
            placeholder="@usuario"
            wire:model="telegram"
        />

        {{-- E-mail Adicional --}}
        <div class="sm:col-span-2">
            <x-input 
                name="additional_email" 
                label="E-mail Adicional" 
                type="email"
                placeholder="email@exemplo.com"
                wire:model="additional_email"
            />
        </div>
    </div>
</x-card>
