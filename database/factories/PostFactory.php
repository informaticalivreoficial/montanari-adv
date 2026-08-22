<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\CatPost;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['artigo', 'page']);
        $title = $this->faker->sentence(4);

        return [
            'autor' => User::factory(),
            'type' => $type,
            'title' => $title,
            'content' => $this->faker->paragraphs(3, true),
            'excerpt' => $this->faker->sentence(12),
            'metaDescription' => $this->faker->sentence(8),
            'slug' => null, // auto-generated
            'tags' => $this->faker->words(3, true),
            'views' => $this->faker->numberBetween(0, 10000),
            'category' => CatPost::factory(),
            'readingTime' => $this->faker->randomElement(['2 min', '5 min', '8 min', '12 min']),
            'comments' => $this->faker->numberBetween(0, 50),
            'status' => $this->faker->randomElement([0, 1]),
            'highlight' => $this->faker->randomElement([0, 1]),
            'menu' => $type === 'page' ? $this->faker->randomElement([0, 1]) : 0,
            'publish_at' => $this->faker->optional(0.8)->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function artigo(): static
    {
        return $this->state(fn () => ['type' => 'artigo']);
    }

    public function page(): static
    {
        return $this->state(fn () => [
            'type' => 'page',
            'highlight' => 0,
            'menu' => $this->faker->randomElement([0, 1]),
        ]);
    }

    public function published(): static
    {
        return $this->state(fn () => ['status' => 1]);
    }

    public function draft(): static
    {
        return $this->state(fn () => ['status' => 0]);
    }

    public function highlighted(): static
    {
        return $this->state(fn () => ['highlight' => 1]);
    }
}
