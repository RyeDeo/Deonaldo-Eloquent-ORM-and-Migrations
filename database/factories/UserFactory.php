<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('Password123!'), // more realistic password
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'registration_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'last_login_date' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}