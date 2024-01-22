<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenresTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(GourmetsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
