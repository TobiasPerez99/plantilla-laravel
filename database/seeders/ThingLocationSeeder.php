<?php

namespace Database\Seeders;

use App\Models\ThingLocation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ThingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ThingLocation::factory(5)->create();

        /* Create bulk data */
        $locations = [
            ['name' => 'Living Room', 'description' => 'Living Room'],
            ['name' => 'Kitchen', 'description' => 'Kitchen'],
            ['name' => 'Bedroom', 'description' => 'Bedroom'],
            ['name' => 'Bathroom', 'description' => 'Bathroom'],
            ['name' => 'Garage', 'description' => 'Garage'],
            ['name' => 'Office', 'description' => 'Office'],
            ['name' => 'Other', 'description' => 'Other'],
        ];

        foreach ($locations as $location) {
            ThingLocation::create($location);
        }
    }
}
