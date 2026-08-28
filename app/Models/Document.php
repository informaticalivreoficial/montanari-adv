<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'process_id',
        'uploaded_by',
        'title',
        'description',
        'file_path',
        'disk',
        'original_name',
        'mime_type',
        'file_size',
        'category',
        'notes',
    ];

    // Relationships
    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    // Scopes
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Accessors
    public function getCategoryLabelAttribute(): string
    {
        return match($this->category) {
            'contract' => 'Contrato',
            'petition' => 'Petição',
            'ruling' => 'Decisão/Julgamento',
            'evidence' => 'Prova',
            'correspondence' => 'Correspondência',
            'other' => 'Outro',
            default => $this->category,
        };
    }

    public function getCategoryIconAttribute(): string
    {
        return match($this->category) {
            'contract' => 'fa-file-contract',
            'petition' => 'fa-file-pen',
            'ruling' => 'fa-gavel',
            'evidence' => 'fa-magnifying-glass',
            'correspondence' => 'fa-envelope',
            'other' => 'fa-file',
            default => 'fa-file',
        };
    }

    public function getFileSizeFormattedAttribute(): string
    {
        if (!$this->file_size) return '-';

        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;

        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 1) . ' ' . $units[$i];
    }

    public function getUrlAttribute(): string
    {
        return route('documents.view', $this);
    }

    /**
     * Delete file from storage when model is deleted
     */
    protected static function booted()
    {
        static::deleting(function ($document) {
            $disk = $document->disk ?? 'public';
            if ($document->file_path && Storage::disk($disk)->exists($document->file_path)) {
                Storage::disk($disk)->delete($document->file_path);
            }
        });
    }
}
