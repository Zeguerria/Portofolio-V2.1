<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RealisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('realisations')->insert([
            [
                'id'=>1,
                'titre'=> "Angane",
                'photo1'=>"public/images/realisations/0CxX04qElH4lYtmCdXWEXRj2zuCpygn2c2sEA0op.png",
                'description1'=>"Application de gstion des archive Angane pour le tésor public",
                'photo2'=>"public/images/realisations/1YBGKJjG0IP5qsXVoZHBW0dI9EMeRVNVMHbqwtag.png",
                'description2'=>"Interface Acceuil de l'application",
                'photo3'=>"public/images/realisations/2nedfGzH69vnXywFAWWaHrvMNMV8ruvPLxGK2q8D.png",
                'description3'=>"Interface Acceuil suite de l'application",
                'photo4'=>"public/images/realisations/Tyba1m4CkM3IJixpaPcajIv9D2Vs4BFNPP7LmIQY.png",
                'description4'=>"Interface gestion des archive",'date'=>"2024-05-15",'user_id'=>1,
                'categorie_id'=>3,
                'created_at'=>"2024-07-07 06:53:16"
            ],
        ]);
    }
}
