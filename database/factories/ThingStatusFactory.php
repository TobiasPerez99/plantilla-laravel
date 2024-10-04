<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThingStatus>
 */
class ThingStatusFactory extends Factory
{
    protected $model = \App\Models\ThingStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Estado ' . $this->faker->word,
            'description' => 'Descripcion ' . $this->faker->sentence(5),
        ];
    }
}
