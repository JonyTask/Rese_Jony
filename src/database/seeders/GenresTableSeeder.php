<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'gourmet_genre' => '寿司'
        ];
        DB::table('genres')->insert($param);

        $param = [
            'gourmet_genre' => '焼肉'
        ];
        DB::table('genres')->insert($param);

        $param = [
            'gourmet_genre' => '居酒屋'
        ];
        DB::table('genres')->insert($param);

        $param = [
            'gourmet_genre' => 'イタリアン'
        ];
        DB::table('genres')->insert($param);

        $param = [
            'gourmet_genre' => 'ラーメン'
        ];
        DB::table('genres')->insert($param);
    }
}
