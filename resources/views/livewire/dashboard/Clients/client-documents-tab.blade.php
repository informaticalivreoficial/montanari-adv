<div>
    {{-- ============================================================
         ÁREA DE UPLOAD
    ============================================================ --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="px-5 py-4 lg:px-6 lg:py-5">
            <div class="mb-4 flex items-center gap-2.5">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                    <i class="fa-solid fa-cloud-arrow-up text-sm"></i>
                </div>

                <div>
                    <h2 class="text-sm font-semibold text-gray-900">
                        Enviar Documento
                    </h2>

                    <p class="text-xs text-gray-500">
                        PDF, Word, JPG ou PNG. Máximo 20MB.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">
                <x-input
                    name="uploadTitle"
                    label="Título do documento"
                    :required="true"
                    placeholder="Ex: Contrato de prestação"
                    wire:model="uploadTitle"
                />

                <x-select
                    name="uploadCategory"
                    label="Categoria"
                    :required="true"
                    :options="[
                        'contract' => 'Contrato',
                        'petition' => 'Petição',
                        'ruling' => 'Decisão/Julgamento',
                        'evidence' => 'Prova',
                        'correspondence' => 'Correspondência',
                        'other' => 'Outro',
                    ]"
                    wire:model="uploadCategory"
                />

                <div class="sm:col-span-2">
                    <x-input
                        name="uploadDescription"
                        label="Descrição (opcional)"
                        placeholder="Breve descrição do documento..."
                        wire:model="uploadDescription"
                    />
                </div>
            </div>

            {{-- Upload Area --}}
            <div class="mt-3">
                <div
                    x-data="{ dragging: false }"
                    x-on:dragover.prevent="dragging = true"
                    x-on:dragleave.prevent="dragging = false"
                    x-on:drop.prevent="
                        dragging = false;
                        const file = $event.dataTransfer.files[0];
                        if (file) {
                            const dt = new DataTransfer();
                            dt.items.add(file);
                            $refs.fileInput.files = dt.files;
                            $refs.fileInput.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                    "
                    class="relative flex items-center gap-4 rounded-lg border-2 border-dashed transition-colors cursor-pointer
                           px-4 py-6"
                    :class="dragging
                        ? 'border-blue-400 bg-blue-50'
                        : (@error('uploadFile') 'border-red-500 bg-red-50/30' @else 'border-gray-200 hover:border-blue-300 hover:bg-gray-50' @enderror)"
                    x-on:click="$refs.fileInput.click()"
                >
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-100 text-blue-600 shrink-0">
                        <i class="fa-solid fa-file-arrow-up text-xl"></i>
                    </div>

                    <div class="min-w-0 flex-1">
                        <template x-if="!dragging">
                            <div>
                                <p class="text-sm font-medium text-gray-700">
                                    <span class="font-semibold text-blue-600">Clique para selecionar</span> ou arraste um arquivo
                                </p>
                                <p class="mt-0.5 text-xs text-gray-400">PDF, DOC, DOCX, JPG, PNG — até 20MB</p>
                            </div>
                        </template>
                        <template x-if="dragging">
                            <p class="text-sm font-semibold text-blue-600">
                                <i class="fa-solid fa-arrow-down mr-1"></i> Solte o arquivo aqui
                            </p>
                        </template>
                    </div>

                    @if($uploadFile)
                        <div class="shrink-0 flex items-center gap-2 rounded-lg bg-blue-50 px-3 py-2">
                            <i class="fa-solid fa-file text-blue-600"></i>
                            <span class="text-sm text-blue-700 font-medium max-w-[200px] truncate">{{ $uploadFile->getClientOriginalName() }}</span>
                            <button
                                type="button"
                                wire:click="$set('uploadFile', null)"
                                x-on:click.stop
                                class="text-blue-400 hover:text-blue-600"
                            >
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </div>
                    @endif

                    <input
                        type="file"
                        x-ref="fileInput"
                        wire:model="uploadFile"
                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                        class="hidden"
                    >
                </div>

                @error('uploadFile')
                    <p class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Notes --}}
            <div class="mt-3">
                <x-textarea
                    name="uploadNotes"
                    label="Notas (opcional)"
                    rows="2"
                    placeholder="Anotações internas sobre este documento..."
                    wire:model="uploadNotes"
                />
            </div>

            {{-- Submit --}}
            <div class="mt-4 flex justify-end">
                <button
                    type="button"
                    wire:click="saveDocument"
                    wire:loading.attr="disabled"
                    wire:target="saveDocument, uploadFile"
                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                >
                    <span wire:loading.remove wire:target="saveDocument">
                        <i class="fa-solid fa-cloud-arrow-up text-xs"></i>
                        Enviar Documento
                    </span>
                    <span wire:loading wire:target="saveDocument">
                        <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                        Enviando...
                    </span>
                </button>
            </div>
        </div>
    </div>


    {{-- ============================================================
         LISTAGEM DE DOCUMENTOS
    ============================================================ --}}
    <div class="mt-4 overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
        <div class="border-b border-gray-200 bg-gray-50 px-5 py-3 lg:px-6">
            <h3 class="text-sm font-semibold text-gray-900">
                <i class="fa-solid fa-folder-open mr-1.5 text-gray-400"></i>
                Documentos do Cliente
                <span class="ml-1.5 text-xs font-normal text-gray-500">({{ $documents->count() }})</span>
            </h3>
        </div>

        @if($documents->isEmpty())
            <div class="flex flex-col items-center justify-center py-12 px-4 text-center">
                <div class="flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 text-gray-400 mb-3">
                    <i class="fa-solid fa-file-circle-question text-xl"></i>
                </div>
                <p class="text-sm font-medium text-gray-900">Nenhum documento cadastrado</p>
                <p class="mt-1 text-xs text-gray-500">Envie o primeiro documento usando o formulário acima.</p>
            </div>
        @else
            <div class="divide-y divide-gray-100">
                @foreach($documents as $doc)
                    @php
                        $categoryColors = [
                            'contract' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700'],
                            'petition' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-700'],
                            'ruling' => ['bg' => 'bg-red-100', 'text' => 'text-red-700'],
                            'evidence' => ['bg' => 'bg-amber-100', 'text' => 'amber-700'],
                            'correspondence' => ['bg' => 'bg-green-100', 'text' => 'text-green-700'],
                            'other' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-600'],
                        ];
                        $colors = $categoryColors[$doc->category] ?? $categoryColors['other'];
                    @endphp
                    <div class="flex items-center gap-4 px-5 py-3.5 hover:bg-gray-50 transition-colors lg:px-6">
                        {{-- Icon --}}
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg {{ $colors['bg'] }} {{ $colors['text'] }}">
                            <i class="fa-solid {{ $doc->category_icon }} text-sm"></i>
                        </div>

                        {{-- Info --}}
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $doc->title }}</p>
                                <span class="shrink-0 inline-flex items-center rounded-full {{ $colors['bg'] }} {{ $colors['text'] }} px-2 py-0.5 text-[11px] font-medium">
                                    {{ $doc->category_label }}
                                </span>
                            </div>
                            <div class="mt-0.5 flex items-center gap-3 text-xs text-gray-500">
                                <span><i class="fa-regular fa-calendar mr-1"></i>{{ $doc->created_at->format('d/m/Y H:i') }}</span>
                                <span><i class="fa-solid fa-weight-hanging mr-1"></i>{{ $doc->file_size_formatted }}</span>
                                @if($doc->uploader)
                                    <span><i class="fa-solid fa-user mr-1"></i>{{ $doc->uploader->name }}</span>
                                @endif
                            </div>
                            @if($doc->description)
                                <p class="mt-1 text-xs text-gray-400 truncate">{{ $doc->description }}</p>
                            @endif
                        </div>

                        {{-- Actions --}}
                        <div class="flex shrink-0 items-center gap-1">
                            <a
                                href="{{ $doc->url }}"
                                target="_blank"
                                class="inline-flex items-center justify-center rounded-md p-2 text-blue-600 hover:bg-blue-50 transition"
                                title="Visualizar"
                            >
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            <a
                                href="{{ route('documents.download', $doc) }}"
                                class="inline-flex items-center justify-center rounded-md p-2 text-green-600 hover:bg-green-50 transition"
                                title="Download"
                            >
                                <i class="fa-solid fa-download text-sm"></i>
                            </a>
                            <button
                                type="button"
                                onclick="MontanariAlert.confirm({
                                    title: 'Excluir documento?',
                                    text: 'Tem certeza que deseja excluir este documento? O arquivo também será removido.',
                                    icon: 'warning',
                                    confirmButtonText: 'Sim, excluir',
                                    cancelButtonText: 'Cancelar',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        @this.call('deleteDocument', {{ $doc->id }})
                                    }
                                })"
                                class="inline-flex items-center justify-center rounded-md p-2 text-red-600 hover:bg-red-50 transition"
                                title="Excluir"
                            >
                                <i class="fa-solid fa-trash text-sm"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
