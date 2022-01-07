<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Places;

class PhotosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'path' => $this->faker->imageUrl(800, 400),
            'comment' => $this->faker->paragraph(),
            'user_id' => User::inRandomOrder()->first(),
            'place_id' => Places::all()->random(1)->first(),
        ];
    }
}
