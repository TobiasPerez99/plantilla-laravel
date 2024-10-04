<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThingLocation>
 */
class ThingLocationFactory extends Factory
{

    protected $model = \App\Models\ThingLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Ubicacion ' . $this->faker->word,
            'description' => 'Descripcion ' . $this->faker->sentence(5),
        ];
    }
}
