<?php

namespace Database\Factories;

use App\Models\FoundItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FoundItem>
 */
class FoundItemFactory extends Factory
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
            'description'=> fake()->paragraph(),
            'foundState'=>fake()->boolean(),
            'user_id'=> User::all()->random()->id,
        ];
    }
}
