<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Process;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Processes\ListProcesses;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class ListProcessesTest extends TestCase
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
        Livewire::test(ListProcesses::class)
            ->assertStatus(200);
    }

    public function test_displays_processes(): void
    {
        Process::factory(3)->create();

        Livewire::test(ListProcesses::class)
            ->assertSee(['Processos', 'Novo Processo']);
    }

    public function test_can_search_processes(): void
    {
        Process::factory()->create(['process_number' => '123456789.2026.8.26.0001']);
        Process::factory()->create(['process_number' => '987654321.2026.8.26.0002']);

        Livewire::test(ListProcesses::class)
            ->set('search', '123456789')
            ->assertSee('123456789')
            ->assertDontSee('987654321');
    }

    public function test_can_filter_by_status(): void
    {
        Process::factory(2)->active()->create();
        Process::factory(1)->archived()->create();

        Livewire::test(ListProcesses::class)
            ->set('filterStatus', 'active')
            ->assertSee(['Ativo', 'Ativo']);
    }

    public function test_can_filter_by_type(): void
    {
        Process::factory(2)->civil()->create();
        Process::factory(1)->criminal()->create();

        Livewire::test(ListProcesses::class)
            ->set('filterType', 'civil')
            ->assertSee(['Cível', 'Cível']);
    }

    public function test_can_delete_process(): void
    {
        $process = Process::factory()->create();

        Livewire::test(ListProcesses::class)
            ->call('delete', $process->id)
            ->assertHasNoErrors();

        $this->assertSoftDeleted('processes', ['id' => $process->id]);
    }

    public function test_empty_state_shown_when_no_processes(): void
    {
        Livewire::test(ListProcesses::class)
            ->assertSee('Nenhum processo encontrado');
    }
}
