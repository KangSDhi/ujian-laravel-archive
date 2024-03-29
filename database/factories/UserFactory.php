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
        $role_id = rand(1, 3);
        $nisn = null;
        $kelas_id = null;
        if ($role_id == 3) {
            $nisn = rand(10000000, 90000000);
            $kelas_id = rand(1, 55);
        }
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('qwerty'),
            'remember_token' => Str::random(10),
            'role_id' => $role_id,
            'NISN' => $nisn,
            'kelas_id' => $kelas_id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
