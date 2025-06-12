<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $post = \App\Models\Post::inRandomOrder()->first();
        $user = \App\Models\User::inRandomOrder()->first();
        $parentId = null;
        if ($post && \App\Models\Comment::where('post_id', $post->id)->count() > 0 && fake()->boolean(30)) {
            $parentId = \App\Models\Comment::where('post_id', $post->id)->inRandomOrder()->first()->id;
        }
        return [
            'comment_content' => fake()->sentence(),
            'comment_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'reviewer_name' => fake()->name(),
            'reviewer_email' => fake()->safeEmail(),
            'is_hidden' => fake()->boolean(),
            'post_id' => $post?->id ?? 1,
            'user_id' => $user?->id ?? 1,
            'parent_comment_id' => $parentId,
        ];
    }
}
