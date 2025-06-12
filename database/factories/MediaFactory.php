<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fileTypes = ['jpg', 'png', 'gif', 'mp4', 'mp3', 'pdf'];
        $fileType = fake()->randomElement($fileTypes);
        $fileName = fake()->unique()->word() . '.' . $fileType;
        $url = match($fileType) {
            'jpg', 'png', 'gif' => fake()->imageUrl(640, 480, 'nature', true),
            'mp4' => 'https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4',
            'mp3' => 'https://sample-videos.com/audio/mp3/crowd-cheering.mp3',
            'pdf' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            default => fake()->url(),
        };
        return [
            'file_name' => $fileName,
            'file_type' => $fileType,
            'file_size' => fake()->numberBetween(100, 50000),
            'url' => $url,
            'upload_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'description' => fake()->sentence(),
            'post_id' => \App\Models\Post::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
