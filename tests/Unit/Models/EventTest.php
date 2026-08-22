<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Event;
use App\Models\Process;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_event(): void
    {
        $event = Event::factory()->create();

        $this->assertNotNull($event->id);
        $this->assertContains($event->event_type, ['hearing', 'meeting', 'deadline', 'task', 'other']);
    }

    public function test_event_belongs_to_process(): void
    {
        $event = Event::factory()->create();

        $this->assertInstanceOf(Process::class, $event->process);
    }

    public function test_event_belongs_to_user(): void
    {
        $event = Event::factory()->create();

        $this->assertInstanceOf(User::class, $event->user);
    }

    public function test_event_type_label_accessor(): void
    {
        $event = Event::factory()->create(['event_type' => 'hearing']);
        $this->assertEquals('Audiência', $event->event_type_label);

        $event = Event::factory()->create(['event_type' => 'meeting']);
        $this->assertEquals('Reunião', $event->event_type_label);

        $event = Event::factory()->create(['event_type' => 'deadline']);
        $this->assertEquals('Prazo', $event->event_type_label);

        $event = Event::factory()->create(['event_type' => 'task']);
        $this->assertEquals('Tarefa', $event->event_type_label);
    }

    public function test_event_type_color_accessor(): void
    {
        $event = Event::factory()->create(['event_type' => 'hearing']);
        $this->assertEquals('#dc2626', $event->event_type_color);

        $event = Event::factory()->create(['event_type' => 'meeting']);
        $this->assertEquals('#2563eb', $event->event_type_color);

        $event = Event::factory()->create(['event_type' => 'deadline']);
        $this->assertEquals('#f59e0b', $event->event_type_color);
    }

    public function test_to_full_calendar_array(): void
    {
        $event = Event::factory()->hearing()->create([
            'title' => 'Audiência Teste',
            'start_date' => now(),
            'end_date' => now()->addHours(2),
            'all_day' => false,
            'location' => 'Sala 12',
        ]);

        $fcArray = $event->toFullCalendarArray();

        $this->assertEquals($event->id, $fcArray['id']);
        $this->assertEquals('Audiência Teste', $fcArray['title']);
        $this->assertEquals(false, $fcArray['allDay']);
        $this->assertEquals('#dc2626', $fcArray['color']);
        $this->assertArrayHasKey('extendedProps', $fcArray);
        $this->assertEquals('hearing', $fcArray['extendedProps']['event_type']);
        $this->assertEquals('Sala 12', $fcArray['extendedProps']['location']);
    }

    public function test_to_full_calendar_array_all_day(): void
    {
        $event = Event::factory()->create([
            'all_day' => true,
            'start_date' => now()->startOfDay(),
            'end_date' => now()->endOfDay(),
        ]);

        $fcArray = $event->toFullCalendarArray();
        $this->assertTrue($fcArray['allDay']);
    }

    public function test_scope_upcoming(): void
    {
        Event::factory(3)->future()->create();
        Event::factory(2)->past()->create();

        $upcoming = Event::upcoming()->get();
        $this->assertCount(3, $upcoming);
    }

    public function test_scope_by_type(): void
    {
        Event::factory(3)->hearing()->create();
        Event::factory(2)->meeting()->create();

        $hearings = Event::byType('hearing')->get();
        $this->assertCount(3, $hearings);
    }

    public function test_soft_delete(): void
    {
        $event = Event::factory()->create();
        $eventId = $event->id;
        $event->delete();

        $this->assertSoftDeleted('events', ['id' => $eventId]);
    }
}
