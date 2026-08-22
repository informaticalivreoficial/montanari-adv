<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Deadline;
use App\Models\Process;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeadlineTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_deadline(): void
    {
        $deadline = Deadline::factory()->create();

        $this->assertNotNull($deadline->id);
        $this->assertContains($deadline->status, ['pending', 'completed', 'expired']);
    }

    public function test_deadline_belongs_to_process(): void
    {
        $deadline = Deadline::factory()->create();

        $this->assertInstanceOf(Process::class, $deadline->process);
    }

    public function test_deadline_belongs_to_responsible(): void
    {
        $deadline = Deadline::factory()->create([
            'responsible_id' => User::factory()->create()->id,
        ]);

        $this->assertInstanceOf(User::class, $deadline->responsible);
    }

    public function test_scope_pending_filters_correctly(): void
    {
        Deadline::factory(3)->pending()->create();
        Deadline::factory(2)->completed()->create();

        $pending = Deadline::pending()->get();
        $this->assertCount(3, $pending);
    }

    public function test_scope_overdue_filters_correctly(): void
    {
        Deadline::factory(2)->overdue()->create();
        Deadline::factory(3)->pending()->create();

        $overdue = Deadline::overdue()->get();
        $this->assertCount(2, $overdue);
    }

    public function test_is_overdue_accessor(): void
    {
        $deadline = Deadline::factory()->create([
            'due_date' => now()->subDays(5),
            'status' => 'pending',
        ]);

        $this->assertTrue($deadline->is_overdue);
    }

    public function test_is_not_overdue_when_completed(): void
    {
        $deadline = Deadline::factory()->create([
            'due_date' => now()->subDays(5),
            'status' => 'completed',
        ]);

        $this->assertFalse($deadline->is_overdue);
    }

    public function test_priority_label_accessor(): void
    {
        $deadline = Deadline::factory()->create(['priority' => 'urgent']);
        $this->assertEquals('Urgente', $deadline->priority_label);

        $deadline = Deadline::factory()->create(['priority' => 'high']);
        $this->assertEquals('Alta', $deadline->priority_label);

        $deadline = Deadline::factory()->create(['priority' => 'normal']);
        $this->assertEquals('Normal', $deadline->priority_label);

        $deadline = Deadline::factory()->create(['priority' => 'low']);
        $this->assertEquals('Baixa', $deadline->priority_label);
    }

    public function test_priority_color_accessor(): void
    {
        $deadline = Deadline::factory()->create(['priority' => 'urgent']);
        $this->assertEquals('red', $deadline->priority_color);

        $deadline = Deadline::factory()->create(['priority' => 'high']);
        $this->assertEquals('orange', $deadline->priority_color);

        $deadline = Deadline::factory()->create(['priority' => 'normal']);
        $this->assertEquals('blue', $deadline->priority_color);
    }

    public function test_status_label_accessor(): void
    {
        $deadline = Deadline::factory()->create(['status' => 'pending']);
        $this->assertEquals('Pendente', $deadline->status_label);

        $deadline = Deadline::factory()->create(['status' => 'completed']);
        $this->assertEquals('Concluído', $deadline->status_label);

        $deadline = Deadline::factory()->create(['status' => 'expired']);
        $this->assertEquals('Expirado', $deadline->status_label);
    }

    public function test_soft_delete(): void
    {
        $deadline = Deadline::factory()->create();
        $deadlineId = $deadline->id;
        $deadline->delete();

        $this->assertSoftDeleted('deadlines', ['id' => $deadlineId]);
        $this->assertNotNull(Deadline::withTrashed()->find($deadlineId));
    }
}
