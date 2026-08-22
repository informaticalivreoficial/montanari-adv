<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Document;
use App\Models\Process;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_document(): void
    {
        $document = Document::factory()->create();

        $this->assertNotNull($document->id);
        $this->assertContains($document->category, ['contract', 'petition', 'ruling', 'evidence', 'correspondence', 'other']);
    }

    public function test_document_belongs_to_process(): void
    {
        $document = Document::factory()->create();

        $this->assertInstanceOf(Process::class, $document->process);
    }

    public function test_document_can_be_without_process(): void
    {
        $document = Document::factory()->create(['process_id' => null]);

        $this->assertNull($document->process_id);
    }

    public function test_document_belongs_to_uploader(): void
    {
        $document = Document::factory()->create();

        $this->assertInstanceOf(User::class, $document->uploader);
    }

    public function test_category_label_accessor(): void
    {
        $document = Document::factory()->create(['category' => 'contract']);
        $this->assertEquals('Contrato', $document->category_label);

        $document = Document::factory()->create(['category' => 'petition']);
        $this->assertEquals('Petição', $document->category_label);

        $document = Document::factory()->create(['category' => 'ruling']);
        $this->assertEquals('Decisão/Julgamento', $document->category_label);

        $document = Document::factory()->create(['category' => 'evidence']);
        $this->assertEquals('Prova', $document->category_label);
    }

    public function test_category_icon_accessor(): void
    {
        $document = Document::factory()->create(['category' => 'contract']);
        $this->assertEquals('fa-file-contract', $document->category_icon);

        $document = Document::factory()->create(['category' => 'petition']);
        $this->assertEquals('fa-file-pen', $document->category_icon);

        $document = Document::factory()->create(['category' => 'evidence']);
        $this->assertEquals('fa-magnifying-glass', $document->category_icon);
    }

    public function test_file_size_formatted_accessor(): void
    {
        $document = Document::factory()->create(['file_size' => 1024]);
        $this->assertEquals('1 KB', $document->file_size_formatted);

        $document = Document::factory()->create(['file_size' => 1048576]);
        $this->assertEquals('1 MB', $document->file_size_formatted);

        $document = Document::factory()->create(['file_size' => null]);
        $this->assertEquals('-', $document->file_size_formatted);
    }

    public function test_scope_by_category(): void
    {
        Document::factory(3)->contract()->create();
        Document::factory(2)->petition()->create();

        $contracts = Document::byCategory('contract')->get();
        $this->assertCount(3, $contracts);
    }

    public function test_soft_delete(): void
    {
        $document = Document::factory()->create();
        $documentId = $document->id;
        $document->delete();

        $this->assertSoftDeleted('documents', ['id' => $documentId]);
    }
}
