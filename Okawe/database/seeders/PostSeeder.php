<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('posts')->insert([
            ['id'=>1, 'title'=> "AUCUN", 'content'=>"La escription test",'created_at'=>"2024-06-14 21:43:28",'updated_at'=>"2024-06-14 21:43:28", 'photo'=>"public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png",'user_id'=>1],

        ]);
    }
}
