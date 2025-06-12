<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $title = fake()->unique()->sentence();
        $status = fake()->randomElement(['D', 'P', 'I']);
        $isPublished = $status === 'P';
        $userIds = \App\Models\User::pluck('id')->all();
        return [
            'title' => $title,
            'content' => fake()->paragraphs(fake()->numberBetween(2, 6), true),
            'slug' => Str::slug($title),
            'publication_date' => $isPublished ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'last_modified_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'status' => $status,
            'featured_image_url' => fake()->imageUrl(640, 480, 'nature', true),
            'views_count' => fake()->numberBetween(0, 10000),
            'user_id' => !empty($userIds) ? fake()->randomElement($userIds) : 1,
        ];
    }
}
