<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class StoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3, true),
            'body' => $this->faker->paragraphs(3, true),
            'type' => $this->faker->randomElement(['educational', 'general', 'career']),
            'status' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween($min = 1, $max = User::count())
        ];
    }
}
