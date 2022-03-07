<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        function image(
            ?string $dir = '/public/images/avatars',
            int $width = 640,
            int $height = 480,
            ?string $category = null,
            bool $fullPath = true,
            bool $randomize = true,
            ?string $word = null,
            bool $gray = false
        )

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'description' => $this->faker->paragraph($nb = 3, $asText = true),
            'file_path' => $this->faker->image(),
            'role' => $this->faker->randomElement($array = array ('admin','author')),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
