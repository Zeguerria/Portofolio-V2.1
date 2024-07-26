<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('tasks')->insert([
            ['id'=>1, 'title'=> "Repos", 'description'=>"Se reposer",'status'=>"cours",'assigned_to'=>1,'project_id'=>1,'start_date'=>"2024-07-22",'end_date'=>"2024-07-23",'created_at'=>"2024-07-24 13:53:45",'updated_at'=>"2024-07-24 13:53:45"],
            ['id'=>2, 'title'=> "Modélisation", 'description'=>"Modélisation du portofolio",'status'=>"attente",'assigned_to'=>1,'project_id'=>2,'start_date'=>"2024-07-23",'end_date'=>"2024-07-24",'created_at'=>"2024-07-24 13:53:45",'updated_at'=>"2024-07-24 13:53:45"],
        ]);
    }
}
