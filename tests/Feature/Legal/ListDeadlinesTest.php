<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Process;
use App\Models\Deadline;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Deadlines\ListDeadlines;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class ListDeadlinesTest extends TestCase
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
        Livewire::test(ListDeadlines::class)
            ->assertStatus(200)
            ->assertSee('Prazos');
    }

    public function test_displays_deadlines(): void
    {
        Deadline::factory(3)->create();

        Livewire::test(ListDeadlines::class)
            ->assertSee('Novo Prazo');
    }

    public function test_can_search_deadlines(): void
    {
        Deadline::factory()->create(['title' => 'Contestação Prazo']);
        Deadline::factory()->create(['title' => 'Recurso Apelação']);

        Livewire::test(ListDeadlines::class)
            ->set('search', 'Contestação')
            ->assertSee('Contestação Prazo')
            ->assertDontSee('Recurso Apelação');
    }

    public function test_can_filter_by_status(): void
    {
        Deadline::factory(2)->pending()->create();
        Deadline::factory(1)->completed()->create();

        Livewire::test(ListDeadlines::class)
            ->set('filterStatus', 'pending')
            ->assertSee('Prazos');
    }

    public function test_can_complete_deadline(): void
    {
        $deadline = Deadline::factory()->pending()->create();

        Livewire::test(ListDeadlines::class)
            ->call('complete', $deadline->id)
            ->assertHasNoErrors();

        $deadline->refresh();
        $this->assertEquals('completed', $deadline->status);
    }

    public function test_can_delete_deadline(): void
    {
        $deadline = Deadline::factory()->create();

        Livewire::test(ListDeadlines::class)
            ->call('delete', $deadline->id)
            ->assertHasNoErrors();

        $this->assertSoftDeleted('deadlines', ['id' => $deadline->id]);
    }

    public function test_empty_state_shown_when_no_deadlines(): void
    {
        Livewire::test(ListDeadlines::class)
            ->assertSee('Nenhum prazo encontrado');
    }
}
