<?php

namespace Tests\Feature\Legal;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Process;
use App\Models\User;
use App\Http\Livewire\Dashboard\Legal\Agenda\Agenda;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;

class AgendaTest extends TestCase
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
        Livewire::test(Agenda::class)
            ->assertStatus(200)
            ->assertSee('Agenda');
    }

    public function test_displays_calendar(): void
    {
        Livewire::test(Agenda::class)
            ->assertSee('fullcalendar')
            ->assertSee('Novo Evento');
    }

    public function test_loads_events(): void
    {
        Event::factory(3)->create();

        $component = Livewire::test(Agenda::class);
        $component->assertViewHas('events');
    }

    public function test_can_open_date_modal(): void
    {
        Livewire::test(Agenda::class)
            ->call('openDateModal', now()->format('Y-m-d'))
            ->assertSet('showModal', true)
            ->assertSet('start_date', now()->format('Y-m-d'));
    }

    public function test_can_open_event_modal(): void
    {
        $event = Event::factory()->create();

        Livewire::test(Agenda::class)
            ->call('openEventModal', $event->id)
            ->assertSet('showModal', true)
            ->assertSet('editingId', $event->id)
            ->assertSet('title', $event->title);
    }

    public function test_can_save_event(): void
    {
        $process = Process::factory()->create([
            'client_id' => User::factory()->create()->id,
        ]);

        Livewire::test(Agenda::class)
            ->call('openDateModal', now()->addDays(5)->format('Y-m-d'))
            ->set('title', 'Nova Audiência')
            ->set('start_time', '09:00')
            ->set('event_type', 'hearing')
            ->set('process_id', $process->id)
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('events', [
            'title' => 'Nova Audiência',
            'event_type' => 'hearing',
        ]);
    }

    public function test_can_update_event(): void
    {
        $event = Event::factory()->create(['title' => 'Original']);

        Livewire::test(Agenda::class)
            ->call('openEventModal', $event->id)
            ->set('title', 'Atualizado')
            ->call('save')
            ->assertHasNoErrors();

        $event->refresh();
        $this->assertEquals('Atualizado', $event->title);
    }

    public function test_can_delete_event(): void
    {
        $event = Event::factory()->create();

        Livewire::test(Agenda::class)
            ->call('openEventModal', $event->id)
            ->call('deleteEvent')
            ->assertHasNoErrors();

        $this->assertSoftDeleted('events', ['id' => $event->id]);
    }

    public function test_can_close_modal(): void
    {
        Livewire::test(Agenda::class)
            ->set('showModal', true)
            ->call('closeModal')
            ->assertSet('showModal', false);
    }

    public function test_validates_required_fields(): void
    {
        Livewire::test(Agenda::class)
            ->call('save')
            ->assertHasErrors(['title', 'start_date']);
    }

    public function test_can_save_all_day_event(): void
    {
        Livewire::test(Agenda::class)
            ->call('openDateModal', now()->format('Y-m-d'))
            ->set('title', 'Dia de Audiências')
            ->set('all_day', true)
            ->set('event_type', 'hearing')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('events', [
            'title' => 'Dia de Audiências',
            'all_day' => true,
        ]);
    }
}
