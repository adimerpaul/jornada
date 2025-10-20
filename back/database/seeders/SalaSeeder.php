<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('salas')->insert([
            ['nombre' => 'Sala 1',],
            ['nombre' => 'Sala 2',],
            ['nombre' => 'Sala 3',],
        ]);
    }
}
