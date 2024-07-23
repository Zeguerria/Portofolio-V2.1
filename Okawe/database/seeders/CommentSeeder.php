<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('comments')->insert([
            ['id'=>1, 'post_id'=>1, 'user_id'=>2, 'body'=>"J'aime ce contenu continuez ainsi",'parent_id'=>null,'created_at'=>"2024-06-14 21:43:28",'updated_at'=>"2024-06-14 21:43:28",'photo'=>null],
            ['id'=>2, 'post_id'=>1, 'user_id'=>2, 'body'=>"continuez",'parent_id'=>null,'created_at'=>"2024-06-14 21:43:53",'updated_at'=>"2024-06-14 21:43:53",'photo'=>""],
            ['id'=>3, 'post_id'=>1, 'user_id'=>1, 'body'=>"Merci",'parent_id'=>1,'created_at'=>"2024-06-18 13:45:54",'updated_at'=>"2024-06-18 13:45:54",'photo'=>"public/images/commentaires/xkvxxqGi7OobSNEdMk6NB4AplqkSL5lXdPUtkiqH.jpg"],
            ['id'=>4, 'post_id'=>1, 'user_id'=>2, 'body'=>"C'est encore moi",'parent_id'=>null,'created_at'=>"2024-06-18 15:05:23",'updated_at'=>"2024-06-18 15:05:23",'photo'=>"public/images/commentaires/xkvxxqGi7OobSNEdMk6NB4AplqkSL5lXdPUtkiqH.jpg"],

        ]);
    }
}
