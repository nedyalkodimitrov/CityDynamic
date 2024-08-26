<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
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
            'profilePhoto' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'foundedAt' => $this->faker->date(),
            'contactEmail' => $this->faker->safeEmail(),
            'contactPhone' => $this->faker->phoneNumber(),
            'contactAddress' => $this->faker->address(),
        ];
    }
}
