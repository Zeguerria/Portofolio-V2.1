<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('type_parametres')->insert([
            ['id'=>1, 'code'=> "AUCUN", 'libelle'=>"AUCUN", 'description'=>"AUCUN"],
            ['id'=>2, 'code'=> "CTGR", 'libelle'=>"Categories", 'description'=>"l'ensemble de categories"],
            ['id'=>3, 'code'=> "MAI/COM", 'libelle'=>"Maitrises et Competences", 'description'=>"l'ensemble de maistrise et competences"],
            // ['id'=>3, 'code'=> "LC", 'libelle'=>"Les communes", 'description'=>"l'ensemble des communes"],
        ]);
    }
}
