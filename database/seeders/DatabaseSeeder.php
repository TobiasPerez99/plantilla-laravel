<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HexaLite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        HexaLite::create([
            'name' => 'Tobias L Perez',
            'email' => 'tobias@securize.com',
            'password' => Hash::make('112233'),
            'is_superadmin' => 1,
            'state' => 'active',
            'ulid' => Str::ulid(),
        ]);

        $this->call([
            HexaLiteSeeder::class,
            ThingSeeder::class,
            ThingTypeSeeder::class,
            ThingStatusSeeder::class,
            ThingLocationSeeder::class,
        ]);
    }
}
