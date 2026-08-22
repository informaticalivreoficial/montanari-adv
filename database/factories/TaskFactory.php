<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        $priorities = ['low', 'normal', 'high', 'urgent'];
        $statuses = ['pending', 'in_progress', 'completed'];

        return [
            'process_id' => Process::factory(),
            'responsible_id' => null,
            'title' => $this->faker->randomElement([
                'Preparar petição inicial',
                'Organizar documentos do processo',
                'Fazer pesquisa jurisprudencial',
                'Redigir parecer jurídico',
                'Agendar audiência com cliente',
                'Verificar prazos do mês',
                'Atualizar cadastro do cliente',
                'Analisar contratos pendentes',
                'Preparar recurso de apelação',
                'Conferir publicação no diário',
            ]),
            'description' => $this->faker->optional(0.7)->sentence(10),
            'due_date' => $this->faker->optional(0.8)->dateTimeBetween('-7 days', '+30 days'),
            'priority' => $this->faker->randomElement($priorities),
            'status' => $this->faker->randomElement($statuses),
            'notes' => $this->faker->optional(0.4)->sentence(5),
        ];
    }

    public function pending(): static
    {
        return $this->state(fn () => ['status' => 'pending']);
    }

    public function inProgress(): static
    {
        return $this->state(fn () => ['status' => 'in_progress']);
    }

    public function completed(): static
    {
        return $this->state(fn () => ['status' => 'completed']);
    }

    public function urgent(): static
    {
        return $this->state(fn () => ['priority' => 'urgent']);
    }
}
