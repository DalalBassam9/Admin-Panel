<?php

namespace Database\Factories;
use File;
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
            'logo'  => $this->faker->imageUrl(400, 300, null, false),
        ];
    }
}