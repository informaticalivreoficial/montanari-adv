<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Process;
use App\Models\Deadline;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Deadlines\CreateDeadline;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class CreateDeadlineTest extends TestCase
{
    use RefreshDatabase;

    protected $process;

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

        $client = User::factory()->create();
        $client->assignRole('client');

        $this->process = Process::factory()->active()->create([
            'client_id' => $client->id,
        ]);
    }

    public function test_can_render_component(): void
    {
        Livewire::test(CreateDeadline::class)
            ->assertStatus(200)
            ->assertSee('Novo Prazo');
    }

    public function test_can_create_deadline(): void
    {
        Livewire::test(CreateDeadline::class)
            ->set('process_id', $this->process->id)
            ->set('title', 'Contestação - Prazo')
            ->set('due_date', now()->addDays(10)->format('Y-m-d'))
            ->set('due_time', '18:00')
            ->set('priority', 'high')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('deadlines', [
            'title' => 'Contestação - Prazo',
            'priority' => 'high',
        ]);
    }

    public function test_validates_required_fields(): void
    {
        Livewire::test(CreateDeadline::class)
            ->call('store')
            ->assertHasErrors(['process_id', 'title', 'due_date']);
    }

    public function test_redirects_after_creation(): void
    {
        Livewire::test(CreateDeadline::class)
            ->set('process_id', $this->process->id)
            ->set('title', 'Prazo de Teste')
            ->set('due_date', now()->addDays(5)->format('Y-m-d'))
            ->set('priority', 'normal')
            ->call('store')
            ->assertRedirect(route('dashboard.legal.deadlines'));
    }

    public function test_populates_processes_and_team(): void
    {
        $component = Livewire::test(CreateDeadline::class);
        $component->assertViewHas('processes');
        $component->assertViewHas('team');
    }
}
