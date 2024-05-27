<?php

namespace Database\Seeders;

use App\Models\Data;
use App\Models\People;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            DataSeeder::class,
            PeopleSeeder::class,
        ]);

    }
}
