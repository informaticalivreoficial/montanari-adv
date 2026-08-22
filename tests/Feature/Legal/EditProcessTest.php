<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Process;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Processes\EditProcess;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class EditProcessTest extends TestCase
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

        $this->process = Process::factory()->create([
            'client_id' => $client->id,
            'process_number' => '123456789.2026.8.26.0001',
            'case_type' => 'civil',
            'court_name' => 'TJSP',
            'status' => 'active',
        ]);
    }

    public function test_can_render_component(): void
    {
        Livewire::test(EditProcess::class, ['id' => $this->process->id])
            ->assertStatus(200)
            ->assertSee('Editar Processo');
    }

    public function test_populates_existing_data(): void
    {
        Livewire::test(EditProcess::class, ['id' => $this->process->id])
            ->assertSet('process_number', '123456789.2026.8.26.0001')
            ->assertSet('case_type', 'civil')
            ->assertSet('court_name', 'TJSP')
            ->assertSet('status', 'active');
    }

    public function test_can_update_process(): void
    {
        Livewire::test(EditProcess::class, ['id' => $this->process->id])
            ->set('court_name', 'TJSP Atualizado')
            ->set('status', 'suspended')
            ->call('update')
            ->assertHasNoErrors();

        $this->process->refresh();
        $this->assertEquals('TJSP Atualizado', $this->process->court_name);
        $this->assertEquals('suspended', $this->process->status);
    }

    public function test_validates_required_fields(): void
    {
        Livewire::test(EditProcess::class, ['id' => $this->process->id])
            ->set('process_number', '')
            ->set('case_type', '')
            ->call('update')
            ->assertHasErrors(['process_number', 'case_type']);
    }

    public function test_validates_unique_process_number(): void
    {
        Process::factory()->create(['process_number' => '999999999.2026.8.26.0002']);

        Livewire::test(EditProcess::class, ['id' => $this->process->id])
            ->set('process_number', '999999999.2026.8.26.0002')
            ->call('update')
            ->assertHasErrors(['process_number']);
    }

    public function test_can_update_with_same_process_number(): void
    {
        Livewire::test(EditProcess::class, ['id' => $this->process->id])
            ->set('process_number', '123456789.2026.8.26.0001')
            ->call('update')
            ->assertHasNoErrors();
    }

    public function test_throws_404_for_nonexistent_process(): void
    {
        $this->expectException(\Throwable::class);

        Livewire::test(EditProcess::class, ['id' => 99999]);
    }
}
