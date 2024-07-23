<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            // ['id'=>1, 'name'=> "Okawe ",'prenom'=>"Jeremy",'phone'=>"074663830",'profil_id'=>2, 'email'=>"supadmin0@gmail.com","password"=>'$2y$12$U9UvQR8F46fzJP08mUrjIef2yqexQIFcDQZEHwippk5UvK50IHQ8S','photo'=>"public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png"],
            // ['id'=>2, 'name'=> "Client ",'prenom'=>"001",'phone'=>"074663830",'profil_id'=>1, 'email'=>"client0@gmail.com","password"=>'$2y$12$U9UvQR8F46fzJP08mUrjIef2yqexQIFcDQZEHwippk5UvK50IHQ8S','photo'=>"public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png"],



            ['id'=>1, 'name'=> "Okawe", 'prenom'=>"Jeremy", 'email'=>"supadmin0@gmail.com", 'password'=> '$2y$10$C7wtcd4uzArwo.daeHcHZu7ARErDIXZdcNY2gjgKVz5grMGDq1VWa','photo'=>'public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png','supprimer'=>0,'phone'=>'074663830','profil_id'=>3],
            ['id'=>2, 'name'=> "Mamadou", 'prenom'=>"Awal", 'email'=>"client0@gmail.com", 'password'=> '$2y$10$C7wtcd4uzArwo.daeHcHZu7ARErDIXZdcNY2gjgKVz5grMGDq1VWa','photo'=>"public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png",'supprimer'=>0,'phone'=>'066297321','profil_id'=>1],
            ['id'=>3, 'name'=> "Madison", 'prenom'=>"Wendy", 'email'=>"client01@gmail.com", 'password'=> '$2y$10$C7wtcd4uzArwo.daeHcHZu7ARErDIXZdcNY2gjgKVz5grMGDq1VWa','photo'=>'public/images/entreprises/vZcyihahB3BNoaUV1XHVey0VcugJHpNfXVTVNPrh.png','supprimer'=>0,'phone'=>'074663830','profil_id'=>1],
        ]);








    }
}
