<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Tasks\ListTasks;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class ListTasksTest extends TestCase
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
        Livewire::test(ListTasks::class)
            ->assertStatus(200)
            ->assertSee('Tarefas');
    }

    public function test_displays_tasks(): void
    {
        Task::factory(3)->create();

        Livewire::test(ListTasks::class)
            ->assertSee('Nova Tarefa');
    }

    public function test_can_search_tasks(): void
    {
        Task::factory()->create(['title' => 'Preparar petição']);
        Task::factory()->create(['title' => 'Organizar documentos']);

        Livewire::test(ListTasks::class)
            ->set('search', 'petição')
            ->assertSee('Preparar petição')
            ->assertDontSee('Organizar documentos');
    }

    public function test_can_toggle_status(): void
    {
        $task = Task::factory()->pending()->create();

        Livewire::test(ListTasks::class)
            ->call('toggleStatus', $task->id)
            ->assertHasNoErrors();

        $task->refresh();
        $this->assertEquals('completed', $task->status);
    }

    public function test_can_toggle_back_to_pending(): void
    {
        $task = Task::factory()->completed()->create();

        Livewire::test(ListTasks::class)
            ->call('toggleStatus', $task->id)
            ->assertHasNoErrors();

        $task->refresh();
        $this->assertEquals('pending', $task->status);
    }

    public function test_can_start_progress(): void
    {
        $task = Task::factory()->pending()->create();

        Livewire::test(ListTasks::class)
            ->call('startProgress', $task->id)
            ->assertHasNoErrors();

        $task->refresh();
        $this->assertEquals('in_progress', $task->status);
    }

    public function test_can_delete_task(): void
    {
        $task = Task::factory()->create();

        Livewire::test(ListTasks::class)
            ->call('delete', $task->id)
            ->assertHasNoErrors();

        $this->assertSoftDeleted('tasks', ['id' => $task->id]);
    }

    public function test_empty_state_shown_when_no_tasks(): void
    {
        Livewire::test(ListTasks::class)
            ->assertSee('Nenhuma tarefa encontrada');
    }
}
