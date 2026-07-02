<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PermissionsSeeder::class,
            AdminSeeder::class,
            ContentSeeder::class,
            BlogSeeder::class,
        ]);
    }
}
