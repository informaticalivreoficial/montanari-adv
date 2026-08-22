<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Process;
use App\Models\Task;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Tasks\CreateTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class CreateTaskTest extends TestCase
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
        Livewire::test(CreateTask::class)
            ->assertStatus(200)
            ->assertSee('Nova Tarefa');
    }

    public function test_can_create_task(): void
    {
        Livewire::test(CreateTask::class)
            ->set('title', 'Preparar petição inicial')
            ->set('priority', 'high')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('tasks', [
            'title' => 'Preparar petição inicial',
            'priority' => 'high',
        ]);
    }

    public function test_can_create_task_without_process(): void
    {
        Livewire::test(CreateTask::class)
            ->set('title', 'Tarefa geral')
            ->set('priority', 'normal')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('tasks', [
            'title' => 'Tarefa geral',
            'process_id' => null,
        ]);
    }

    public function test_validates_required_fields(): void
    {
        Livewire::test(CreateTask::class)
            ->call('store')
            ->assertHasErrors(['title']);
    }

    public function test_redirects_after_creation(): void
    {
        Livewire::test(CreateTask::class)
            ->set('title', 'Tarefa de teste')
            ->set('priority', 'normal')
            ->call('store')
            ->assertRedirect(route('dashboard.legal.tasks'));
    }
}
