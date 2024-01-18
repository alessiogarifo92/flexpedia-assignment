<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //define factory's info to make fake data and get the user_id value randomly from user table 
        return [
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'publication_date' => $this->faker->dateTime(),
        ];
    }
}
