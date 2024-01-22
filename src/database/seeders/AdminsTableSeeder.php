<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'estra',
            'email' => 'estra@gmail.com',
            'password' => Hash::make('mitacross'),
        ];
        DB::table('admins')->insert($param);
    }
}
