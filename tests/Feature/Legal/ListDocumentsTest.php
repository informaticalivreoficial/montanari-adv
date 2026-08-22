<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Document;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Documents\ListDocuments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class ListDocumentsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'super-admin']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'manager']);
        Role::firstOrCreate(['name' => 'client']);

        $this->user = User::factory()->create();
        $this->user->assignRole('super-admin');
        $this->actingAs($this->user);
    }

    public function test_can_render_component(): void
    {
        Livewire::test(ListDocuments::class)
            ->assertStatus(200)
            ->assertSee('Documentos');
    }

    public function test_displays_documents(): void
    {
        Document::factory(3)->create();

        Livewire::test(ListDocuments::class)
            ->assertSee('Enviar Documento');
    }

    public function test_can_search_documents(): void
    {
        Document::factory()->create(['title' => 'Contrato Social']);
        Document::factory()->create(['title' => 'Petição Inicial']);

        Livewire::test(ListDocuments::class)
            ->set('search', 'Contrato')
            ->assertSee('Contrato Social')
            ->assertDontSee('Petição Inicial');
    }

    public function test_can_filter_by_category(): void
    {
        Document::factory(2)->contract()->create();
        Document::factory(1)->petition()->create();

        Livewire::test(ListDocuments::class)
            ->set('filterCategory', 'contract');
    }

    public function test_can_delete_document(): void
    {
        Storage::fake('public');
        $document = Document::factory()->create([
            'file_path' => 'documents/test.pdf',
        ]);

        Livewire::test(ListDocuments::class)
            ->call('delete', $document->id)
            ->assertHasNoErrors();

        $this->assertSoftDeleted('documents', ['id' => $document->id]);
    }

    public function test_can_upload_document(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('documento.pdf', 100, 'application/pdf');

        Livewire::test(ListDocuments::class)
            ->set('uploadFile', $file)
            ->set('uploadTitle', 'Contrato de Prestação')
            ->set('uploadCategory', 'contract')
            ->call('upload')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('documents', [
            'title' => 'Contrato de Prestação',
            'category' => 'contract',
        ]);
    }

    public function test_validates_upload_required_fields(): void
    {
        Livewire::test(ListDocuments::class)
            ->call('upload')
            ->assertHasErrors(['uploadFile', 'uploadTitle']);
    }

    public function test_empty_state_shown_when_no_documents(): void
    {
        Livewire::test(ListDocuments::class)
            ->assertSee('Nenhum documento encontrado');
    }
}
