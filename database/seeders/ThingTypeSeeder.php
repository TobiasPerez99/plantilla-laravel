<?php

namespace Database\Seeders;

use App\Models\ThingType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ThingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Light Smart', 'description' => 'Light Smart'],
            ['name' => 'Door Lock', 'description' => 'Door Lock'],
            ['name' => 'Camera Smart', 'description' => 'Camera Smart'],
            ['name' => 'Thermostat Smart', 'description' => 'Thermostat Smart'],
            ['name' => 'Speaker Smart', 'description' => 'Speaker Smart'],
            ['name' => 'Movement Sensor', 'description' => 'Movement Sensor']
        ];

        foreach ($types as $type) {
            ThingType::create($type);
        }
    }
}
