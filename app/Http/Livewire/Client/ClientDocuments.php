<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Process;
use App\Models\Document;

class ClientDocuments extends Component
{
    use WithFileUploads;

    public $selectedProcess = '';
    public $documents = [];
    public $processes = [];

    // Upload form
    public $documentTitle = '';
    public $documentDescription = '';
    public $documentFile;
    public $documentCategory = 'other';
    public $uploading = false;
    public $showUploadForm = false;

    protected $rules = [
        'selectedProcess' => 'required|exists:processes,id',
        'documentTitle' => 'required|string|min:3|max:255',
        'documentDescription' => 'nullable|string|max:500',
        'documentFile' => 'required|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png',
        'documentCategory' => 'required|in:contract,petition,ruling,evidence,correspondence,other',
    ];

    protected $messages = [
        'selectedProcess.required' => 'Selecione um processo.',
        'selectedProcess.exists' => 'Processo não encontrado.',
        'documentTitle.required' => 'Informe o título do documento.',
        'documentTitle.min' => 'O título deve ter pelo menos 3 caracteres.',
        'documentFile.required' => 'Selecione um arquivo.',
        'documentFile.max' => 'O arquivo deve ter no máximo 10MB.',
        'documentFile.mimes' => 'Formatos aceitos: PDF, DOC, DOCX, JPG, PNG.',
    ];

    public function mount()
    {
        $userId = Auth::id();

        $this->processes = Process::where('client_id', $userId)
            ->where('status', 'active')
            ->get();

        $this->loadDocuments();
    }

    protected function loadDocuments()
    {
        $userId = Auth::id();
        $processIds = Process::where('client_id', $userId)->pluck('id')->toArray();

        $this->documents = Document::whereIn('process_id', $processIds)
            ->orderBy('created_at', 'desc')
            ->with('process')
            ->get()
            ->toArray();
    }

    public function toggleUploadForm()
    {
        $this->showUploadForm = !$this->showUploadForm;
    }

    public function updatedDocumentFile()
    {
        $this->validateOnly('documentFile');
    }

    public function uploadDocument()
    {
        $this->validate();

        $this->uploading = true;

        try {
            $file = $this->documentFile;
            $filename = time() . '_' . Auth::id() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents/client', $filename, 'public');

            Document::create([
                'process_id' => $this->selectedProcess,
                'uploaded_by' => Auth::id(),
                'title' => $this->documentTitle,
                'description' => $this->documentDescription,
                'file_path' => $path,
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'category' => $this->documentCategory,
            ]);

            $this->reset(['documentTitle', 'documentDescription', 'documentFile', 'documentCategory', 'selectedProcess']);
            $this->showUploadForm = false;
            $this->loadDocuments();

            session()->flash('success', 'Documento enviado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao enviar documento. Tente novamente.');
        } finally {
            $this->uploading = false;
        }
    }

    public function deleteDocument($documentId)
    {
        $userId = Auth::id();

        $document = Document::where('id', $documentId)
            ->where('uploaded_by', $userId)
            ->first();

        if ($document) {
            if ($document->file_path && Storage::disk('public')->exists($document->file_path)) {
                Storage::disk('public')->delete($document->file_path);
            }
            $document->delete();
            $this->loadDocuments();
            session()->flash('success', 'Documento excluído.');
        }
    }

    public function render()
    {
        return view('livewire.client.client-documents')->layout('layouts.client', ['title' => 'Documentos']);
    }
}
