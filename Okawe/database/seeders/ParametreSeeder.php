<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParametreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('parametres')->insert([
            ['id'=>1, 'code'=> "AUCUN", 'libelle'=>"AUCUN", 'description'=>"AUCUN",'type_parametre_id'=>1],
            // CATEGORIES DE REALISATIONS
            ['id'=>2, 'code'=> "PSNL", 'libelle'=>"Personnelle", 'description'=>"catégories personnelle",'type_parametre_id'=>2],
            ['id'=>3, 'code'=> "EEQP", 'libelle'=>"Equique", 'description'=>"catégories equipe",'type_parametre_id'=>2],
            // COMPETENCES ET MAITRISES
            ['id'=>4, 'code'=> "MTRS", 'libelle'=>"Maitrise", 'description'=>"type de maitrise",'type_parametre_id'=>3],
            ['id'=>5, 'code'=> "CMPT", 'libelle'=>"Competence", 'description'=>"type de competence",'type_parametre_id'=>3],
        ]);
    }
}
