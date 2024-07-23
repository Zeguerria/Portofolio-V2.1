<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompetenceMaitriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('competence_maitrises')->insert([
            ['id'=>1, 'nom'=> "Laravel", 'icon'=>"fab fa-laravel", 'level'=>85,'type_id'=>4],
            ['id'=>2, 'nom'=> "Bootstrap", 'icon'=>"fab fa-bootstrap", 'level'=>90,'type_id'=>4],
            ['id'=>3, 'nom'=> "Symfony", 'icon'=>"fab fa-artstation", 'level'=>60,'type_id'=>4],
            ['id'=>4, 'nom'=> "Angular", 'icon'=>"fab fa-angular", 'level'=>45,'type_id'=>4],
            ['id'=>5, 'nom'=> "Ionic", 'icon'=>"fab fa-creative-commons-nd", 'level'=>40,'type_id'=>4],
            ['id'=>6, 'nom'=> "Html", 'icon'=>"fab fa-html5", 'level'=>80,'type_id'=>5],
            ['id'=>7, 'nom'=> "Css", 'icon'=>"fab fa-css3-alt", 'level'=>60,'type_id'=>5],
            ['id'=>8, 'nom'=> "Js", 'icon'=>"fab fa-js", 'level'=>45,'type_id'=>5],
            ['id'=>9, 'nom'=> "Jq", 'icon'=>"fab fa-js-square", 'level'=>49,'type_id'=>5],
            ['id'=>10, 'nom'=> "Python", 'icon'=>"fab fa-python", 'level'=>68,'type_id'=>5],
            ['id'=>11, 'nom'=> "C++", 'icon'=>"fab fa-codiepie", 'level'=>60,'type_id'=>5],
            // ['id'=>12, 'nom'=> "C++", 'icon'=>"fab fa-codiepie", 'level'=>60,'type_id'=>5],
        ]);
    }
}
