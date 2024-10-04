<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HexaLite>
 */
class HexaLiteFactory extends Factory
{

    protected $model = 'App\Models\HexaLite';

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ulid' => '01J9AX62YXMBN7K0CZ4A48PM' . rand(1, 5),
            'name' => 'HexaLite',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_superadmin' => 1,
            'state' => 'active'
        ];
    }
}
