<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Process;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Processes\CreateProcess;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class CreateProcessTest extends TestCase
{
    use RefreshDatabase;

    protected $team;
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();

        // Create all required roles
        Role::firstOrCreate(['name' => 'super-admin']);
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'manager']);
        Role::firstOrCreate(['name' => 'client']);

        $this->user = User::factory()->create();
        $this->user->assignRole('super-admin');

        $this->client = User::factory()->create();
        $this->client->assignRole('client');

        $this->team = User::factory()->create();
        $this->team->assignRole('super-admin');

        $this->actingAs($this->user);
    }

    public function test_can_render_component(): void
    {
        Livewire::test(CreateProcess::class)
            ->assertStatus(200)
            ->assertSee('Novo Processo');
    }

    public function test_can_create_process(): void
    {
        Livewire::test(CreateProcess::class)
            ->set('client_id', $this->client->id)
            ->set('process_number', '123456789.2026.8.26.0001')
            ->set('case_type', 'civil')
            ->set('court_name', 'TJSP')
            ->set('status', 'active')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('processes', [
            'process_number' => '123456789.2026.8.26.0001',
            'case_type' => 'civil',
            'status' => 'active',
        ]);
    }

    public function test_validates_required_fields(): void
    {
        Livewire::test(CreateProcess::class)
            ->call('store')
            ->assertHasErrors(['client_id', 'process_number', 'case_type']);
    }

    public function test_validates_unique_process_number(): void
    {
        Process::factory()->create(['process_number' => '123456789.2026.8.26.0001']);

        Livewire::test(CreateProcess::class)
            ->set('client_id', $this->client->id)
            ->set('process_number', '123456789.2026.8.26.0001')
            ->set('case_type', 'civil')
            ->call('store')
            ->assertHasErrors(['process_number']);
    }

    public function test_redirects_after_creation(): void
    {
        Livewire::test(CreateProcess::class)
            ->set('client_id', $this->client->id)
            ->set('process_number', '999999999.2026.8.26.0001')
            ->set('case_type', 'civil')
            ->set('status', 'active')
            ->call('store')
            ->assertRedirect(route('dashboard.legal.processes'));
    }

    public function test_populates_clients_and_team(): void
    {
        $component = Livewire::test(CreateProcess::class);
        $component->assertViewHas('clients');
        $component->assertViewHas('team');
    }

    public function test_can_create_with_all_fields(): void
    {
        Livewire::test(CreateProcess::class)
            ->set('client_id', $this->client->id)
            ->set('responsible_id', $this->team->id)
            ->set('process_number', '111111111.2026.8.26.0001')
            ->set('case_type', 'criminal')
            ->set('court_name', 'TJSP')
            ->set('court_variable', '1ª Vara Criminal')
            ->set('case_area', 'Direito Penal')
            ->set('opposing_party', 'João da Silva')
            ->set('opposing_lawyer', 'Maria Santos - OAB/SP')
            ->set('description', 'Processo de teste')
            ->set('status', 'active')
            ->set('client_interest', '15')
            ->set('contract_value', 'R$ 10.000,00')
            ->set('internal_notes', 'Nota interna')
            ->call('store')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('processes', [
            'process_number' => '111111111.2026.8.26.0001',
            'court_name' => 'TJSP',
            'opposing_party' => 'João da Silva',
        ]);
    }
}
