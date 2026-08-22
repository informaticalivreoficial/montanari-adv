<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        $eventTypes = ['hearing', 'meeting', 'deadline', 'task', 'other'];
        $colors = ['#dc2626', '#2563eb', '#f59e0b', '#10b981', '#6b7280'];

        $start = $this->faker->dateTimeBetween('-7 days', '+60 days');
        $end = (clone $start)->modify('+' . $this->faker->numberBetween(1, 3) . ' hours');

        return [
            'process_id' => Process::factory(),
            'user_id' => User::factory(),
            'title' => $this->faker->randomElement([
                'Audiência - Testemunhal',
                'Audiência de Conciliação',
                'Reunião com cliente',
                'Reunião de equipe',
                'Prazo para recurso',
                'Julgamento de recurso',
                'Reunião com parte contrária',
                'Audiência inaugural',
                'Perícia judicial',
                'Conciliação',
            ]),
            'description' => $this->faker->optional(0.7)->sentence(8),
            'start_date' => $start,
            'end_date' => $end,
            'all_day' => $this->faker->boolean(15),
            'event_type' => $this->faker->randomElement($eventTypes),
            'color' => $this->faker->optional(0.5)->randomElement($colors),
            'location' => $this->faker->optional(0.6)->randomElement([
                'Fórum Central - Sala 12',
                'TJSP - Sala de Audiências 5',
                'Escritório - Sala de Reuniões',
                'Justiça Federal - Sala 3',
                'TRT-2 - Sala 8',
                'Online - Google Meet',
            ]),
            'notes' => $this->faker->optional(0.3)->sentence(5),
        ];
    }

    public function hearing(): static
    {
        return $this->state(fn () => [
            'event_type' => 'hearing',
            'color' => '#dc2626',
        ]);
    }

    public function meeting(): static
    {
        return $this->state(fn () => [
            'event_type' => 'meeting',
            'color' => '#2563eb',
        ]);
    }

    public function past(): static
    {
        return $this->state(fn () => [
            'start_date' => $this->faker->dateTimeBetween('-30 days', '-1 day'),
            'end_date' => $this->faker->dateTimeBetween('-29 days', 'now'),
        ]);
    }

    public function future(): static
    {
        return $this->state(fn () => [
            'start_date' => $this->faker->dateTimeBetween('now', '+60 days'),
            'end_date' => $this->faker->dateTimeBetween('+1 day', '+61 days'),
        ]);
    }
}
