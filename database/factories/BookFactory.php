<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



class BookFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //english sentence with 4 words
            'name' => fake()->sentence(4),
        ];
    }
}
