<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PlacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slug' => $this->faker->unique()->slug(),
            'address' => $this->faker->address(),
            'latitude' => $this->faker->latitude(36, 69),
            'longitude' => $this->faker->longitude(-9, 29),
            'description' => $this->faker->paragraph(),
            'visited_at' => $this->faker->dateTimeThisCentury(),
            'thumbnail' => $this->faker->imageUrl(800, 400),
            'shared' => true,
            'user_id' => User::inRandomOrder()->first(),
        ];
    }
}
