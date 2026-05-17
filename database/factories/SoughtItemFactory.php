<?php

namespace Database\Factories;

use App\Models\SoughtItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SoughtItem>
 */
class SoughtItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description'=> fake()->sentence(),
            'foundState'=>fake()->boolean(),
            'user_id'=> User::all()->random()->id,
        ];
    }
}
