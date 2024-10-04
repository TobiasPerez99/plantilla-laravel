<?php

namespace Database\Seeders;

use App\Models\HexaLite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HexaLiteSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HexaLite::factory(1)->create();
    }
}
