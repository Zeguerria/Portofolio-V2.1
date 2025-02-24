<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(TypeParametreSeeder::class);
        $this->call(ParametreSeeder::class);
        $this->call(ProfilSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RealisationSeeder::class);
        $this->call(CompetenceMaitriseSeeder::class);
        $this->call(EntrepriseSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(VisitorSeeder::class);

        // $this->call(CommentSeeder::class);

    }
}
