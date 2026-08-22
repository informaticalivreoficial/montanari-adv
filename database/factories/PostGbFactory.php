<?php

namespace Database\Factories;

use App\Models\PostGb;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostGbFactory extends Factory
{
    protected $model = PostGb::class;

    public function definition(): array
    {
        return [
            'post' => Post::factory(),
            'path' => $this->faker->uuid() . '.jpg',
            'cover' => $this->faker->optional(0.2)->boolean(),
        ];
    }

    public function cover(): static
    {
        return $this->state(fn () => ['cover' => true]);
    }
}
