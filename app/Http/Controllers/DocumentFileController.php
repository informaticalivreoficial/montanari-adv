<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class DocumentFileController extends Controller
{
    /**
     * Visualiza o documento inline (preview no navegador).
     * Gera URL pré-assinada do R2 (bucket privado) ou serve o arquivo local.
     */
    public function view(Document $document)
    {
        $this->authorizeAccess($document);

        $disk = $document->disk ?? 'public';

        if ($disk === 'r2') {
            return redirect()->away(
                Storage::disk('r2')->temporaryUrl(
                    $document->file_path,
                    now()->addMinutes(5),
                    ['ResponseContentDisposition' => 'inline']
                )
            );
        }

        return response()->file(storage_path('app/public/' . $document->file_path));
    }

    /**
     * Força o download do documento.
     */
    public function download(Document $document)
    {
        $this->authorizeAccess($document);

        $disk = $document->disk ?? 'public';
        $filename = $document->original_name ?? $document->title;

        if ($disk === 'r2') {
            return redirect()->away(
                Storage::disk('r2')->temporaryUrl(
                    $document->file_path,
                    now()->addMinutes(5),
                    ['ResponseContentDisposition' => 'attachment; filename="' . addslashes($filename) . '"']
                )
            );
        }

        return response()->download(storage_path('app/public/' . $document->file_path), $filename);
    }

    /**
     * Cliente só acessa documentos dos seus próprios processos.
     * Equipe (admin/manager/super-admin) acessa qualquer um.
     */
    protected function authorizeAccess(Document $document): void
    {
        $user = Auth::user();

        if ($user->isClient()) {
            if (!$document->process || $document->process->client_id !== $user->id) {
                abort(403);
            }
        }
    }
}
