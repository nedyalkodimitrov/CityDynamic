<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Station>
 */
class StationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'city' => $this->faker->numberBetween(1,10),
            'profilePhoto' => $this->faker->imageUrl(),
            'contactEmail' => $this->faker->safeEmail(),
            'contactPhone' => $this->faker->phoneNumber(),
            'contactAddress' => $this->faker->address(),
        ];
    }
}
