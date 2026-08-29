<?php

namespace App\Http\Livewire\Dashboard\Legal\Documents;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Document;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;

class ListDocuments extends Component
{
    use WithPagination, WithFileUploads, HasAlerts;

    public $search = '';
    public $filterCategory = '';
    public $filterProcess = '';
    public $filterClient = '';

    protected $queryString = ['search', 'filterCategory', 'filterProcess', 'filterClient'];

    // Upload modal
    public $showUploadModal = false;
    public $uploadFile = null;
    public $uploadTitle = '';
    public $uploadDescription = '';
    public $uploadProcessId = '';
    public $uploadCategory = 'other';
    public $uploadNotes = '';

    public $processes = [];
    public $clients = [];

    protected $listeners = ['refreshDocuments' => '$refresh'];

    public function mount()
    {
        $this->processes = Process::active()->pluck('process_number', 'id')->toArray();
        $this->clients = User::role('client')->pluck('name', 'id')->toArray();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->swalConfirm(
            title: 'Excluir documento?',
            text: 'Tem certeza que deseja excluir este documento? Esta ação não pode ser desfeita.',
            method: 'delete',
            params: [$id],
            confirmBtn: 'Sim, excluir',
            cancelBtn: 'Cancelar',
        );
    }

    public function delete($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        $this->toastSuccess('Documento excluído com sucesso!');
    }

    // ── Regras de upload ──────────────────────────────────
    protected static int   $maxUploadSize   = 20480;
    protected static array $uploadMimeTypes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'image/jpeg', 'image/png',
    ];

    public function saveDocument()
    {
        $this->validate([
            'uploadFile'     => 'required|file|max:20480',
            'uploadTitle'    => 'required|string|max:255',
            'uploadCategory' => 'required|string',
        ]);

        $disk = config('filesystems.disks.r2') ? 'r2' : 'public';

        $file = $this->uploadFile;
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $userId = auth()->id();
        $path = "documents/{$userId}/" . date('Y') . '/' . date('m');

        $file->storeAs($path, $filename, $disk);

        Document::create([
            'process_id'    => $this->uploadProcessId ?: null,
            'uploaded_by'   => $userId,
            'title'         => $this->uploadTitle,
            'description'   => $this->uploadDescription ?: null,
            'file_path'     => "{$path}/{$filename}",
            'disk'          => $disk,
            'original_name' => $file->getClientOriginalName(),
            'mime_type'     => $file->getMimeType(),
            'file_size'     => $file->getSize(),
            'category'      => $this->uploadCategory,
            'notes'         => $this->uploadNotes ?: null,
        ]);

        $this->showUploadModal = false;
        $this->resetUploadForm();
        $this->toastSuccess('Documento enviado com sucesso!');
    }

    protected function resetUploadForm()
    {
        $this->uploadFile = null;
        $this->uploadTitle = '';
        $this->uploadDescription = '';
        $this->uploadProcessId = '';
        $this->uploadCategory = 'other';
        $this->uploadNotes = '';
    }

    public function closeModal()
    {
        $this->showUploadModal = false;
        $this->resetUploadForm();
    }

    public function render()
    {
        $documents = Document::with('process', 'uploader')
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->filterCategory, fn($q) => $q->where('category', $this->filterCategory))
            ->when($this->filterProcess, fn($q) => $q->whereHas('process', fn($pq) => $pq->where('process_number', 'like', "%{$this->filterProcess}%")))
            ->when($this->filterClient, fn($q) => $q->whereHas('process', fn($pq) => $pq->where('client_id', $this->filterClient)))
            ->latest()
            ->paginate(10);

        $processesList = $this->processes;
        $clientsList = $this->clients;

        return view('livewire.dashboard.Legal.Documents.list', compact('documents', 'processesList', 'clientsList'))
            ->layout('layouts.admin', ['title' => 'Documentos']);
    }
}
