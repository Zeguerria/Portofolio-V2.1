<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('projets')->insert([
            ['id'=>1, 'name'=> "Aucun", 'description'=>"Aucune description"],
            ['id'=>2, 'name'=> "Protofolio", 'description'=>"Conception de mon portofolio"],
        ]);
    }
}
