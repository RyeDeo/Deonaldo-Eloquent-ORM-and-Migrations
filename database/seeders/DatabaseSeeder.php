<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TagSeeder;
use Database\Seeders\CommentSeeder;
use Database\Seeders\MediaSeeder;
use Database\Seeders\UserRoleSeeder;
use Database\Seeders\PostCategorySeeder;
use Database\Seeders\PostTagSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PostSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            UserRoleSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            PostCategorySeeder::class,
            PostTagSeeder::class,
            CommentSeeder::class,
            MediaSeeder::class,
        ]);
    }
}
