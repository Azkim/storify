<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Story;

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
            'title' => $this->faker->sentence(4,true),
            'body' => $this->faker->paragraph($nb = 3, $asText = true),
            'type' => $this->faker->randomElement($array = array ('educational','general','career')),
            'status' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween($min = 0, $max =94),
        ];
    } 
}
