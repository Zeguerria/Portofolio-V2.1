<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('profils')->insert([
            ['id'=>1, 'code'=> "P-CL", 'libelle'=>"Client", 'description'=>"Simple Client"],
            ['id'=>2, 'code'=> "P-A", 'libelle'=>"Admin", 'description'=>"Administrateur"],
            ['id'=>3, 'code'=> "P-SA", 'libelle'=>"SuperAdmin", 'description'=>"Concepteur "],
        ]);
    }
}
