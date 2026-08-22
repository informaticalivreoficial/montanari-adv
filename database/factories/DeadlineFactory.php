<?php

namespace Database\Factories;

use App\Models\Deadline;
use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeadlineFactory extends Factory
{
    protected $model = Deadline::class;

    public function definition(): array
    {
        $priorities = ['low', 'normal', 'high', 'urgent'];
        $statuses = ['pending', 'completed', 'expired'];

        return [
            'process_id' => Process::factory(),
            'responsible_id' => null,
            'title' => $this->faker->randomElement([
                'Contestação - Prazo para manifestação',
                'Recurso de Apelação',
                'Agravo de Instrumento',
                'Embargos de Declaração',
                'Réplica ao Contestação',
                'Prazo para provas periciais',
                'Alteraçao de tutela',
                'Impugnação ao valor da causa',
            ]),
            'description' => $this->faker->optional(0.7)->sentence(8),
            'due_date' => $this->faker->dateTimeBetween('-7 days', '+60 days'),
            'reminder_at' => $this->faker->optional(0.5)->dateTimeBetween('-3 days', '+30 days'),
            'priority' => $this->faker->randomElement($priorities),
            'status' => $this->faker->randomElement($statuses),
            'notes' => $this->faker->optional(0.5)->sentence(5),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn () => ['status' => 'pending']);
    }

    public function completed(): static
    {
        return $this->state(fn () => ['status' => 'completed']);
    }

    public function expired(): static
    {
        return $this->state(fn () => ['status' => 'expired']);
    }

    public function overdue(): static
    {
        return $this->state(fn () => [
            'due_date' => $this->faker->dateTimeBetween('-30 days', '-1 day'),
            'status' => 'pending',
        ]);
    }

    public function urgent(): static
    {
        return $this->state(fn () => [
            'priority' => 'urgent',
            'due_date' => $this->faker->dateTimeBetween('now', '+3 days'),
        ]);
    }
}
