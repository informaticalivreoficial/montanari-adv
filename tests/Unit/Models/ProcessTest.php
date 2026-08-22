<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Process;
use App\Models\User;
use App\Models\Deadline;
use App\Models\Task;
use App\Models\Event;
use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProcessTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_process(): void
    {
        $client = User::factory()->create();
        $responsible = User::factory()->create();

        $process = Process::factory()->create([
            'client_id' => $client->id,
            'responsible_id' => $responsible->id,
        ]);

        $this->assertNotNull($process->id);
        $this->assertEquals($client->id, $process->client_id);
        $this->assertEquals($responsible->id, $process->responsible_id);
    }

    public function test_process_belongs_to_client(): void
    {
        $process = Process::factory()->create();

        $this->assertInstanceOf(User::class, $process->client);
    }

    public function test_process_belongs_to_responsible(): void
    {
        $process = Process::factory()->create([
            'responsible_id' => User::factory()->create()->id,
        ]);

        $this->assertInstanceOf(User::class, $process->responsible);
    }

    public function test_process_has_many_deadlines(): void
    {
        $process = Process::factory()->create();
        Deadline::factory(3)->create(['process_id' => $process->id]);

        $this->assertCount(3, $process->deadlines);
    }

    public function test_process_has_many_tasks(): void
    {
        $process = Process::factory()->create();
        Task::factory(2)->create(['process_id' => $process->id]);

        $this->assertCount(2, $process->tasks);
    }

    public function test_process_has_many_events(): void
    {
        $process = Process::factory()->create();
        Event::factory(4)->create(['process_id' => $process->id]);

        $this->assertCount(4, $process->events);
    }

    public function test_process_has_many_documents(): void
    {
        $process = Process::factory()->create();
        Document::factory(2)->create(['process_id' => $process->id]);

        $this->assertCount(2, $process->documents);
    }

    public function test_scope_active_filters_correctly(): void
    {
        Process::factory(3)->active()->create();
        Process::factory(2)->archived()->create();

        $active = Process::active()->get();
        $this->assertCount(3, $active);
    }

    public function test_scope_by_type_filters_correctly(): void
    {
        Process::factory(3)->civil()->create();
        Process::factory(2)->criminal()->create();

        $civil = Process::byType('civil')->get();
        $this->assertCount(3, $civil);
    }

    public function test_scope_search_finds_by_number(): void
    {
        $process = Process::factory()->create([
            'process_number' => '123456789.2026.8.26.0001',
        ]);

        $results = Process::search('123456789')->get();
        $this->assertCount(1, $results);
        $this->assertEquals($process->id, $results->first()->id);
    }

    public function test_scope_search_finds_by_court(): void
    {
        Process::factory()->create(['court_name' => 'TJSP']);

        $results = Process::search('TJSP')->get();
        $this->assertCount(1, $results);
    }

    public function test_scope_search_finds_by_opposing_party(): void
    {
        Process::factory()->create(['opposing_party' => 'João da Silva']);

        $results = Process::search('João da Silva')->get();
        $this->assertCount(1, $results);
    }

    public function test_status_label_accessor(): void
    {
        $process = Process::factory()->create(['status' => 'active']);
        $this->assertEquals('Ativo', $process->status_label);

        $process = Process::factory()->create(['status' => 'suspended']);
        $this->assertEquals('Suspenso', $process->status_label);

        $process = Process::factory()->create(['status' => 'archived']);
        $this->assertEquals('Arquivado', $process->status_label);

        $process = Process::factory()->create(['status' => 'closed']);
        $this->assertEquals('Encerrado', $process->status_label);
    }

    public function test_status_color_accessor(): void
    {
        $process = Process::factory()->create(['status' => 'active']);
        $this->assertEquals('green', $process->status_color);

        $process = Process::factory()->create(['status' => 'suspended']);
        $this->assertEquals('yellow', $process->status_color);
    }

    public function test_case_type_label_accessor(): void
    {
        $process = Process::factory()->create(['case_type' => 'civil']);
        $this->assertEquals('Cível', $process->case_type_label);

        $process = Process::factory()->create(['case_type' => 'criminal']);
        $this->assertEquals('Criminal', $process->case_type_label);

        $process = Process::factory()->create(['case_type' => 'family']);
        $this->assertEquals('Família', $process->case_type_label);
    }

    public function test_soft_delete(): void
    {
        $process = Process::factory()->create();
        $processId = $process->id;
        $process->delete();

        $this->assertSoftDeleted('processes', ['id' => $processId]);
        $this->assertNull(Process::find($processId));
        $this->assertNotNull(Process::withTrashed()->find($processId));
    }

    public function test_can_update_process(): void
    {
        $process = Process::factory()->create();

        $process->update([
            'court_name' => 'TJSP Atualizado',
            'status' => 'suspended',
        ]);

        $process->refresh();
        $this->assertEquals('TJSP Atualizado', $process->court_name);
        $this->assertEquals('suspended', $process->status);
    }
}
