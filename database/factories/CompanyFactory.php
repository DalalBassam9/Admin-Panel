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
            'name' => $this->faker->unique()->company,
            'email' => $this->faker->unique()->email,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl($width = 100, $height = 100),
        ];
    }
}
