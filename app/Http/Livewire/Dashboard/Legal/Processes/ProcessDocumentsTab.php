<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Process;
use App\Models\Document;
use App\Traits\HasAlerts;

class ProcessDocumentsTab extends Component
{
    use WithFileUploads, HasAlerts;

    public $processId;
    public $process;

    // Upload form
    public $uploadFile = null;
    public $uploadTitle = '';
    public $uploadDescription = '';
    public $uploadCategory = 'other';
    public $uploadNotes = '';

    public $documents;

    // Regras de upload
    protected static int   $maxUploadSize   = 20480;
    protected static array $uploadMimeTypes = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'image/jpeg',
        'image/png',
    ];

    protected $listeners = ['refreshDocuments' => '$refresh'];

    public function mount($processId)
    {
        $this->processId = $processId;
        $this->process = Process::findOrFail($processId);
        $this->loadDocuments();
    }

    public function loadDocuments(): void
    {
        $this->documents = $this->process
            ->documents()
            ->with('uploader')
            ->latest()
            ->get();
    }

    // ─── Upload ─────────────────────────────────────────────────

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
        $path = "processes/{$this->processId}/documents/" . date('Y') . '/' . date('m');

        $file->storeAs($path, $filename, $disk);

        Document::create([
            'process_id'     => $this->processId,
            'uploaded_by'    => $userId,
            'title'          => $this->uploadTitle,
            'description'    => $this->uploadDescription ?: null,
            'file_path'      => "{$path}/{$filename}",
            'disk'           => $disk,
            'original_name'  => $file->getClientOriginalName(),
            'mime_type'      => $file->getMimeType(),
            'file_size'      => $file->getSize(),
            'category'       => $this->uploadCategory,
            'notes'          => $this->uploadNotes ?: null,
        ]);

        $this->resetUploadForm();
        $this->loadDocuments();
        $this->toastSuccess('Documento enviado com sucesso!');
    }

    protected function resetUploadForm(): void
    {
        $this->uploadFile = null;
        $this->uploadTitle = '';
        $this->uploadDescription = '';
        $this->uploadCategory = 'other';
        $this->uploadNotes = '';
        $this->resetValidation();
    }

    // ─── Exclusão ───────────────────────────────────────────────

    public function confirmDeleteDocument($id)
    {
        $this->swalConfirm(
            title: 'Excluir documento?',
            text: 'Tem certeza que deseja excluir este documento? O arquivo também será removido.',
            method: 'deleteDocument',
            params: [$id],
            confirmBtn: 'Sim, excluir',
            cancelBtn: 'Cancelar',
        );
    }

    public function deleteDocument($id)
    {
        $document = Document::where('id', $id)
            ->where('process_id', $this->processId)
            ->first();

        if ($document) {
            $document->delete();
            $this->loadDocuments();
            $this->toastSuccess('Documento excluído com sucesso!');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Processes.process-documents-tab');
    }
}
