<?php

namespace Database\Factories;

use App\Models\CatPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatPostFactory extends Factory
{
    protected $model = CatPost::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->words(2, true);

        return [
            'id_pai' => null,
            'title' => ucfirst($title),
            'content' => $this->faker->optional(0.5)->sentence(10),
            'slug' => null, // auto-generated
            'tags' => $this->faker->optional(0.5)->words(2, true),
            'views' => $this->faker->numberBetween(0, 1000),
            'type' => $this->faker->randomElement(['artigo', 'page']),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }

    public function active(): static
    {
        return $this->state(fn () => ['status' => 1]);
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['status' => 0]);
    }
}
