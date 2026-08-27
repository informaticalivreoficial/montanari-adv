<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.legal.deadlines') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Novo Prazo</h1>
            <p class="mt-1 text-sm text-gray-500">Registre um novo prazo processual.</p>
        </div>
    </div>

    <form wire:submit.prevent="store" x-data="{ submitting: false }" x-init="
        new MutationObserver(() => {
            if (!submitting) return;
            const el = document.querySelector('.text-red-500');
            if (el) { submitting = false; el.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
        }).observe($el, { childList: true, subtree: true });
    " x-on:submit="submitting = true">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-clock text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados do Prazo</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <x-input name="title" label="Título" placeholder="Ex: Contestação - Prazo para manifestação" wire:model="title" />
                            </div>
                            <x-input name="due_date" label="Data de Vencimento" type="date" wire:model="due_date" />
                            <x-input name="due_time" label="Horário" type="time" wire:model="due_time" />
                            <x-input name="reminder_at" label="Lembrar em" type="datetime-local" wire:model="reminder_at" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-align-left text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Descrição</h3>
                        </div>
                        <x-textarea name="description" label="Descrição" rows="3" placeholder="Detalhes do prazo..." wire:model="description" />
                    </div>

                    <div class="border-t border-gray-100"></div>

                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-sticky-note text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Observações</h3>
                        </div>
                        <x-textarea name="notes" rows="3" placeholder="Anotações sobre este prazo..." wire:model="notes" />
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-folder text-sm"></i>
                            </div>
<div x-data="{ submitting: false }" x-init="
    new MutationObserver(() => {
        if (!submitting) return;
        const el = document.querySelector('.text-red-500');
        if (el) { submitting = false; el.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
    }).observe($el, { childList: true, subtree: true });
" x-on:submit="submitting = true">
                                <h3 class="text-sm font-semibold text-gray-900">Processo</h3>
                                <p class="text-xs text-gray-500">Obrigatório</p>
                            </div>
                        </div>
                        <select wire:model="process_id" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition @error('process_id') border-red-500 @enderror">
                            <option value="">Selecione o processo</option>
                            @foreach($processes as $id => $number)
                                <option value="{{ $id }}">{{ $number }}</option>
                            @endforeach
                        </select>
                        @error('process_id')
                            <p class="mt-1 flex items-center gap-1 text-xs text-red-500">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-user-tie text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Responsável</h3>
                        </div>
                        <select wire:model="responsible_id" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="">Selecione</option>
                            @foreach($team as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-flag text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Prioridade</h3>
                        </div>
                        <div class="space-y-2">
                            @foreach(['low' => 'Baixa', 'normal' => 'Normal', 'high' => 'Alta', 'urgent' => 'Urgente'] as $value => $label)
                                <label class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 cursor-pointer hover:bg-gray-50 {{ $priority === $value ? 'border-amber-500 bg-amber-50' : '' }}">
                                    <input type="radio" wire:model="priority" value="{{ $value }}" class="accent-amber-600">
                                    <span class="text-sm text-gray-700">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <div class="space-y-3">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            wire:target="store"
                        >
                            <span wire:loading.remove wire:target="store">
                                <i class="fa-solid fa-save text-xs"></i>
                                Criar Prazo
                            </span>
                            <span wire:loading wire:target="store">
                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                Salvando...
                            </span>
                        </button>
                        <a
                            href="{{ route('dashboard.legal.deadlines') }}"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                        >
                            <i class="fa-solid fa-times text-xs"></i>
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
