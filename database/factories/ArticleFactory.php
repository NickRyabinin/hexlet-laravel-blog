<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creator = User::factory()->create();

        return [
            'name' => fake()->unique()->sentence(3),
            'body' => fake()->text(),
            'user_id' => $creator->id,
        ];
    }
}
