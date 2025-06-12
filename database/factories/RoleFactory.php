<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $role = fake()->randomElement(['A', 'C', 'S']);
        $description = match ($role) {
            'A' => 'Administrator',
            'C' => 'Customer',
            'S' => 'Staff',
            default => 'Unknown',
        };
        return [
            'role_name' => $role,
            'description' => $description,
        ];
    }
}
