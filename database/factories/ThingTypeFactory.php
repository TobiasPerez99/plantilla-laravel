<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThingType>
 */
class ThingTypeFactory extends Factory
{
    protected $model = \App\Models\ThingType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Tipo ' . $this->faker->word,
            'description' => 'Descripcion ' . $this->faker->sentence(5),
            'default_icon' => 'fas fa-cube',
        ];
    }
}
