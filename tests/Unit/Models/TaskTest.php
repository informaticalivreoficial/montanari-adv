<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Task;
use App\Models\Process;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task(): void
    {
        $task = Task::factory()->create();

        $this->assertNotNull($task->id);
        $this->assertContains($task->status, ['pending', 'in_progress', 'completed']);
    }

    public function test_task_belongs_to_process(): void
    {
        $task = Task::factory()->create();

        $this->assertInstanceOf(Process::class, $task->process);
    }

    public function test_task_can_be_without_process(): void
    {
        $task = Task::factory()->create(['process_id' => null]);

        $this->assertNull($task->process_id);
        $this->assertNull($task->process);
    }

    public function test_task_belongs_to_responsible(): void
    {
        $task = Task::factory()->create([
            'responsible_id' => User::factory()->create()->id,
        ]);

        $this->assertInstanceOf(User::class, $task->responsible);
    }

    public function test_scope_pending_filters_correctly(): void
    {
        Task::factory(3)->pending()->create();
        Task::factory(2)->completed()->create();

        $this->assertCount(3, Task::pending()->get());
    }

    public function test_scope_in_progress_filters_correctly(): void
    {
        Task::factory(2)->inProgress()->create();
        Task::factory(3)->pending()->create();

        $this->assertCount(2, Task::inProgress()->get());
    }

    public function test_priority_label_accessor(): void
    {
        $task = Task::factory()->create(['priority' => 'urgent']);
        $this->assertEquals('Urgente', $task->priority_label);

        $task = Task::factory()->create(['priority' => 'low']);
        $this->assertEquals('Baixa', $task->priority_label);
    }

    public function test_status_label_accessor(): void
    {
        $task = Task::factory()->create(['status' => 'pending']);
        $this->assertEquals('Pendente', $task->status_label);

        $task = Task::factory()->create(['status' => 'in_progress']);
        $this->assertEquals('Em Andamento', $task->status_label);

        $task = Task::factory()->create(['status' => 'completed']);
        $this->assertEquals('Concluído', $task->status_label);
    }

    public function test_soft_delete(): void
    {
        $task = Task::factory()->create();
        $taskId = $task->id;
        $task->delete();

        $this->assertSoftDeleted('tasks', ['id' => $taskId]);
    }
}
