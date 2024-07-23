<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('visitors')->insert([
            ['id'=>1, 'ip_address'=> "192.190.160.1", 'visited_at'=>"2024-05-14 21:43:28", 'created_at'=>"2024-05-14 21:43:28",'updated_at'=>"2024-05-14 21:43:28"],
            ['id'=>2, 'ip_address'=> "192.190.160.2", 'visited_at'=>"2024-05-15 21:43:28", 'created_at'=>"2024-05-15 21:43:28",'updated_at'=>"2024-05-15 21:43:28"],
            ['id'=>3, 'ip_address'=> "192.190.160.3", 'visited_at'=>"2024-05-16 21:43:28", 'created_at'=>"2024-05-16 21:43:28",'updated_at'=>"2024-05-16 21:43:28"],
            // ['id'=>3, 'code'=> "LC", 'libelle'=>"Les communes", 'description'=>"l'ensemble des communes"],
        ]);
    }
}
