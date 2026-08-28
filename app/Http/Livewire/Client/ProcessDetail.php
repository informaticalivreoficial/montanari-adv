<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Process;
use App\Models\Document;
use Livewire\WithFileUploads;

class ProcessDetail extends Component
{
    use WithFileUploads;

    public $processId;
    public $process;
    public $documents = [];
    public $deadlines = [];
    public $timeline = [];
    public $tasks = [];

    // Document upload
    public $documentTitle = '';
    public $documentDescription = '';
    public $documentFile;
    public $documentCategory = 'other';
    public $uploading = false;

    protected $rules = [
        'documentTitle' => 'required|string|min:3|max:255',
        'documentDescription' => 'nullable|string|max:500',
        'documentFile' => 'required|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png',
        'documentCategory' => 'required|in:contract,petition,ruling,evidence,correspondence,other',
    ];

    protected $messages = [
        'documentTitle.required' => 'Informe o título do documento.',
        'documentTitle.min' => 'O título deve ter pelo menos 3 caracteres.',
        'documentFile.required' => 'Selecione um arquivo.',
        'documentFile.max' => 'O arquivo deve ter no máximo 10MB.',
        'documentFile.mimes' => 'Formatos aceitos: PDF, DOC, DOCX, JPG, PNG.',
    ];

    public function mount($id)
    {
        $this->processId = $id;
        $this->loadData();
    }

    protected function loadData()
    {
        $userId = Auth::id();

        $this->process = Process::where('id', $this->processId)
            ->where('client_id', $userId)
            ->with(['responsible', 'client'])
            ->first();

        if (!$this->process) {
            abort(404, 'Processo não encontrado.');
        }

        // Documents
        $this->documents = Document::where('process_id', $this->processId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        // Deadlines
        $this->deadlines = \App\Models\Deadline::where('process_id', $this->processId)
            ->orderBy('due_date', 'asc')
            ->get()
            ->toArray();

        // Tasks
        $this->tasks = \App\Models\Task::where('process_id', $this->processId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        // Build timeline from events, deadlines, tasks, documents
        $this->buildTimeline();
    }

    protected function buildTimeline()
    {
        $events = [];

        // Process creation
        $events[] = [
            'date' => $this->process->created_at,
            'type' => 'info',
            'icon' => 'fa-plus-circle',
            'color' => 'blue',
            'title' => 'Processo iniciado',
            'description' => "Processo nº {$this->process->process_number} foi registrado no sistema.",
        ];

        // Deadlines
        foreach ($this->deadlines as $deadline) {
            $events[] = [
                'date' => $deadline['created_at'],
                'type' => 'deadline',
                'icon' => 'fa-clock',
                'color' => $deadline['status'] === 'completed' ? 'green' : ($deadline['priority'] === 'urgent' ? 'red' : 'orange'),
                'title' => $deadline['title'],
                'description' => "Prazo: " . \Carbon\Carbon::parse($deadline['due_date'])->format('d/m/Y'),
            ];
        }

        // Tasks
        foreach ($this->tasks as $task) {
            $events[] = [
                'date' => $task['created_at'],
                'type' => 'task',
                'icon' => 'fa-list-check',
                'color' => $task['status'] === 'completed' ? 'green' : 'gray',
                'title' => $task['title'],
                'description' => match($task['status'] ?? 'pending') {
                    'completed' => 'Concluída',
                    'inProgress' => 'Em andamento',
                    'urgent' => 'Urgente',
                    default => 'Pendente',
                },
            ];
        }

        // Documents
        foreach ($this->documents as $doc) {
            $events[] = [
                'date' => $doc['created_at'],
                'type' => 'document',
                'icon' => 'fa-file-lines',
                'color' => 'purple',
                'title' => $doc['title'],
                'description' => "Documento: {$doc['original_name']} (" . ($doc['category'] ?? 'Outro') . ")",
            ];
        }

        // Sort by date descending
        usort($events, fn($a, $b) => strtotime($b['date']) - strtotime($a['date']));

        $this->timeline = $events;
    }

    public function uploadDocument()
    {
        $this->validate();

        $this->uploading = true;

        try {
            $disk = config('filesystems.disks.r2') ? 'r2' : 'public';

            $file = $this->documentFile;
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('documents/client', $filename, $disk);

            Document::create([
                'process_id' => $this->processId,
                'uploaded_by' => Auth::id(),
                'title' => $this->documentTitle,
                'description' => $this->documentDescription,
                'file_path' => $path,
                'disk' => $disk,
                'original_name' => $file->getClientOriginalName(),
                'mime_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
                'category' => $this->documentCategory,
            ]);

            $this->reset(['documentTitle', 'documentDescription', 'documentFile', 'documentCategory']);
            $this->loadData();

            session()->flash('success', 'Documento enviado com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao enviar documento. Tente novamente.');
        } finally {
            $this->uploading = false;
        }
    }

    public function render()
    {
        return view('livewire.client.process-detail')->layout('layouts.client', ['title' => 'Detalhes do Processo']);
    }
}
