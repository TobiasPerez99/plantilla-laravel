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
        ThingLocation::factory(5)->create();
    }
}
