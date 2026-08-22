@props([
    'title' => 'Redes Sociais',
])

{{--
  Componente: x-forms.social
  Uso:
    <x-forms.social />
    
  Requer no Livewire component:
    public $facebook, $twitter, $instagram, $linkedin;
--}}

<x-card title="{{ $title }}" icon="fa-share-nodes">
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        {{-- Facebook --}}
        <div class="space-y-1">
            <label for="facebook" class="block text-sm font-medium text-gray-700">
                <i class="fa-brands fa-facebook text-blue-600 mr-1"></i> Facebook
            </label>
            <input
                type="url"
                id="facebook"
                name="facebook"
                placeholder="https://facebook.com/perfil"
                wire:model="facebook"
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                       focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            />
            @error('facebook')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Instagram --}}
        <div class="space-y-1">
            <label for="instagram" class="block text-sm font-medium text-gray-700">
                <i class="fa-brands fa-instagram text-pink-600 mr-1"></i> Instagram
            </label>
            <input
                type="url"
                id="instagram"
                name="instagram"
                placeholder="https://instagram.com/perfil"
                wire:model="instagram"
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                       focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            />
            @error('instagram')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- LinkedIn --}}
        <div class="space-y-1">
            <label for="linkedin" class="block text-sm font-medium text-gray-700">
                <i class="fa-brands fa-linkedin text-blue-700 mr-1"></i> LinkedIn
            </label>
            <input
                type="url"
                id="linkedin"
                name="linkedin"
                placeholder="https://linkedin.com/in/perfil"
                wire:model="linkedin"
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                       focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            />
            @error('linkedin')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        {{-- Twitter / X --}}
        <div class="space-y-1">
            <label for="twitter" class="block text-sm font-medium text-gray-700">
                <i class="fa-brands fa-x-twitter text-gray-800 mr-1"></i> Twitter / X
            </label>
            <input
                type="url"
                id="twitter"
                name="twitter"
                placeholder="https://x.com/perfil"
                wire:model="twitter"
                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                       focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
            />
            @error('twitter')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    </div>
</x-card>
