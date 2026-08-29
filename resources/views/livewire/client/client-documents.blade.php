<div>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Documentos</h1>
            <p class="text-gray-500 mt-1">Envie e gerencie os documentos dos seus processos.</p>
        </div>
        @if($processes->count())
            <button wire:click="toggleUploadForm"
                    class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
                <i class="fa-solid fa-plus mr-2"></i> Enviar Documento
            </button>
        @endif
    </div>

    {{-- Upload Form --}}
    @if($showUploadForm)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="font-semibold text-gray-800 mb-4">
                <i class="fa-solid fa-file-arrow-up mr-2 text-blue-600"></i> Enviar Novo Documento
            </h3>

            <form wire:submit.prevent="uploadDocument">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Process --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Processo <span class="text-red-500">*</span>
                        </label>
                        <select wire:model.defer="selectedProcess"
                                class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            <option value="">Selecione o processo</option>
                            @foreach($processes as $process)
                                <option value="{{ $process->id }}">
                                    {{ $process->process_number }} — {{ $process->court_name ?? 'Sem tribunal' }}
                                </option>
                            @endforeach
                        </select>
                        @error('selectedProcess')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Categoria <span class="text-red-500">*</span>
                        </label>
                        <select wire:model.defer="documentCategory"
                                class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            <option value="other">Outro</option>
                            <option value="contract">Contrato</option>
                            <option value="petition">Petição</option>
                            <option value="ruling">Decisão/Julgamento</option>
                            <option value="evidence">Prova</option>
                            <option value="correspondence">Correspondência</option>
                        </select>
                        @error('documentCategory')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Título <span class="text-red-500">*</span>
                        </label>
                        <input type="text" wire:model.defer="documentTitle" placeholder="Ex: RG, CPF, Contrato..."
                               class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        @error('documentTitle')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- File --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Arquivo <span class="text-red-500">*</span>
                        </label>
                        <input type="file" wire:model="documentFile"
                               accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                               class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none file:mr-3 file:py-1 file:px-3 file:rounded file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-600 hover:file:bg-blue-100">
                        @error('documentFile')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descrição (opcional)</label>
                        <textarea wire:model.defer="documentDescription" rows="2" placeholder="Observações sobre o documento..."
                                  class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-none"></textarea>
                        @error('documentDescription')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 mt-4">
                    <button type="submit"
                            wire:loading.attr="disabled" wire:loading.class="opacity-70"
                            class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-medium">
                        <span wire:loading.remove wire:target="uploadDocument">
                            <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Enviar
                        </span>
                        <span wire:loading wire:target="uploadDocument">
                            <i class="fa-solid fa-spinner fa-spin mr-2"></i> Enviando...
                        </span>
                    </button>
                    <button type="button" wire:click="toggleUploadForm"
                            class="px-5 py-2.5 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    @endif

    {{-- Sem processos --}}
    @if(!$processes->count())
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 px-6 py-12 text-center">
            <i class="fa-solid fa-folder-open text-5xl text-gray-200 mb-4"></i>
            <p class="text-gray-500 text-lg">Nenhum processo ativo</p>
            <p class="text-gray-400 text-sm mt-1">Quando você tiver processos ativos, poderá enviar documentos.</p>
        </div>

    {{-- Lista de documentos --}}
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="px-6 py-4 border-b border-gray-100">
                <h3 class="font-semibold text-gray-800">
                    <i class="fa-solid fa-file-lines mr-2 text-green-600"></i>
                    Documentos Enviados ({{ $documents->count() }})
                </h3>
            </div>

            @if($documents->count())
                <div class="divide-y divide-gray-50">
                    @foreach($documents as $doc)
                        <div class="px-6 py-4 hover:bg-gray-50 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4 min-w-0 flex-1">
                                    {{-- Icon --}}
                                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                                        <i class="fa-solid {{ $doc->category_icon }} {{ match($doc->category) {
                                            'contract' => 'text-blue-500',
                                            'petition' => 'text-purple-500',
                                            'ruling' => 'text-yellow-600',
                                            'evidence' => 'text-green-500',
                                            'correspondence' => 'text-gray-500',
                                            default => 'text-gray-400',
                                        } }}"></i>
                                    </div>

                                    <div class="min-w-0 flex-1">
                                        <p class="font-medium text-gray-800 text-sm truncate">{{ $doc->title }}</p>
                                        <div class="flex items-center gap-3 text-xs text-gray-500 mt-0.5">
                                            @if($doc->original_name)
                                                <span class="truncate">{{ $doc->original_name }}</span>
                                            @endif
                                            @if($doc->process)
                                                <span class="text-blue-500 flex-shrink-0">
                                                    <i class="fa-solid fa-scale-balanced mr-1"></i>
                                                    {{ $doc->process->process_number }}
                                                </span>
                                            @endif
                                            <span class="flex-shrink-0">{{ $doc->created_at->format('d/m/Y H:i') }}</span>
                                            @if($doc->file_size)
                                                <span class="flex-shrink-0">{{ $doc->file_size_formatted }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-1 flex-shrink-0 ml-4">
                                    @if($doc->file_path)
                                        <a href="{{ route('documents.view', $doc) }}" target="_blank"
                                           class="p-2 rounded-lg hover:bg-blue-50 text-blue-600 transition" title="Visualizar">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('documents.download', $doc) }}"
                                           class="p-2 rounded-lg hover:bg-green-50 text-green-600 transition" title="Baixar">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                    @endif
                                    @if($doc->uploaded_by === Auth::id())
                                        <button
                                            x-on:click="
                                                MontanariAlert.confirm({
                                                    title: 'Excluir documento?',
                                                    text: 'Tem certeza que deseja excluir este documento? Esta ação não pode ser desfeita.',
                                                    confirmButtonText: 'Sim, excluir',
                                                    cancelButtonText: 'Cancelar'
                                                }).then(r => {
                                                    if (r.isConfirmed) $wire.deleteDocument({{ $doc->id }})
                                                })
                                            "
                                            class="p-2 rounded-lg hover:bg-red-50 text-red-500 transition" title="Excluir"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="px-6 py-12 text-center">
                    <i class="fa-solid fa-file-circle-plus text-5xl text-gray-200 mb-4"></i>
                    <p class="text-gray-500 text-lg">Nenhum documento enviado</p>
                    <p class="text-gray-400 text-sm mt-1">Clique em "Enviar Documento" para adicionar o primeiro.</p>
                </div>
            @endif
        </div>
    @endif
</div>
