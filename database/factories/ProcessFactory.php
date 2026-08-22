<?php

namespace Database\Factories;

use App\Models\Process;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcessFactory extends Factory
{
    protected $model = Process::class;

    public function definition(): array
    {
        $types = ['civil', 'criminal', 'family', 'labor', 'administrative', 'tax', 'consumer', 'other'];
        $statuses = ['active', 'suspended', 'archived', 'closed'];

        return [
            'client_id' => User::factory(),
            'responsible_id' => null,
            'process_number' => $this->faker->unique()->numerify('##########.#.####.##.###.#####') . '.' . $this->faker->randomElement(['8.26.016', '8.26.015', '8.19.000']),
            'court_name' => $this->faker->randomElement([
                'Tribunal de Justiça de São Paulo',
                'Tribunal de Justiça do Rio de Janeiro',
                'Justiça Federal - Seção Judiciária de SP',
                'Justiça do Trabalho - TRT-2',
                'Tribunal de Justiça de Minas Gerais',
            ]),
            'court_variable' => $this->faker->randomElement([
                '1ª Vara Cível', '2ª Vara Cível', '3ª Vara de Família',
                '1ª Vara Criminal', '1ª Vara do Trabalho', 'Vara Federal',
            ]),
            'case_type' => $this->faker->randomElement($types),
            'case_area' => $this->faker->randomElement([
                'Direito Civil', 'Direito Penal', 'Direito de Família',
                'Direito do Trabalho', 'Direito Administrativo', 'Direito Tributário',
                'Direito do Consumidor',
            ]),
            'opposing_party' => $this->faker->name(),
            'opposing_lawyer' => $this->faker->name() . ' - OAB/' . $this->faker->randomElement(['SP', 'RJ', 'MG', 'PR']),
            'description' => $this->faker->sentence(10),
            'status' => $this->faker->randomElement($statuses),
            'client_interest' => $this->faker->optional(0.7)->randomFloat(2, 5, 30),
            'contract_value' => $this->faker->optional(0.8)->numerify('R$ #.###.##,#') . ',' . $this->faker->randomDigit(),
            'internal_notes' => $this->faker->optional(0.6)->sentence(8),
        ];
    }

    public function active(): static
    {
        return $this->state(fn () => ['status' => 'active']);
    }

    public function suspended(): static
    {
        return $this->state(fn () => ['status' => 'suspended']);
    }

    public function archived(): static
    {
        return $this->state(fn () => ['status' => 'archived']);
    }

    public function closed(): static
    {
        return $this->state(fn () => ['status' => 'closed']);
    }

    public function civil(): static
    {
        return $this->state(fn () => ['case_type' => 'civil']);
    }

    public function criminal(): static
    {
        return $this->state(fn () => ['case_type' => 'criminal']);
    }

    public function family(): static
    {
        return $this->state(fn () => ['case_type' => 'family']);
    }

    public function labor(): static
    {
        return $this->state(fn () => ['case_type' => 'labor']);
    }
}
