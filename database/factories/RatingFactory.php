<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Places;

class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->paragraph(),
            'user_id' => User::inRandomOrder()->first(),
            'place_id' => Places::all()->random(1)->first(),
        ];
    }
}
