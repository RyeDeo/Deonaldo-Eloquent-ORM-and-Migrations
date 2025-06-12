<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        if ($users->count() == 0)
        {
            echo 'No users found, please run UserSeeder.';
            return;
        }

        foreach (range(1, 20) as $i) {
            Post::factory()->create([
                'user_id' => $users->random()->id,
                'publication_date' => now()->subDays(rand(0, 30)), // random date within last 30 days
            ]);
        }
    }
}
