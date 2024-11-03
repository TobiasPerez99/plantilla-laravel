<?php

namespace Database\Seeders;

use App\Models\ThingStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ThingStatus::factory(5)->create();


        /* Create bulk data */
        $statuses = [
            ['name' => 'Online', 'description' => 'Online'],
            ['name' => 'Offline', 'description' => 'Offline'],
            ['name' => 'Maintenance', 'description' => 'Maintenance'],
            ['name' => 'Error', 'description' => 'Error'],
        ];

        foreach ($statuses as $status) {
            ThingStatus::create($status);
        }
    }
}
