<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('entreprises')->insert([
            ['id'=>1, 'nom'=> "CNPE", 'responsable'=>"PAOUL EDOU", 'phone'=>"074877103", 'periode'=>"01/08/23-Maintenant",'photo'=>"public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png",'status'=>1],
            ['id'=>2, 'nom'=> "Distributeur 2.0", 'responsable'=>"Sony OUKATA", 'phone'=>"077331457", 'periode'=>"01/06/23-01/07/23",'photo'=>"public/images/entreprises/Iq1xmnDJnIVFyUSURnPGH1gyJeI6pO0P0DAjYJJ4.png",'status'=>0],
        ]);
    }
}
