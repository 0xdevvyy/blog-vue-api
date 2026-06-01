<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3, 8));

        return [
            'user_id' => User::factory(),

            'title' => $title,

            'slug' => Str::slug($title) . '-' . fake()->unique()->numberBetween(1000, 9999),

            'content' => fake()->paragraphs(10, true),

            'description' => fake()->sentence(),

            'blog_image' => fake()->imageUrl(
                1200,
                630,
                'technology',
                true
            ),

            'status' => fake()->randomElement([
                'published',
                'draft',
            ]),
        ];
    }
}
