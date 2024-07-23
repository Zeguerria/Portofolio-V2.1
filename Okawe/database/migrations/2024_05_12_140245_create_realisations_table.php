<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('realisations', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('photo1')->nullable();
            $table->text('description1')->nullable();
            $table->string('photo2')->nullable();
            $table->text('description2')->nullable();
            $table->string('photo3')->nullable();
            $table->text('description3')->nullable();
            $table->string('photo4')->nullable();
            $table->text('description4')->nullable();
            $table->string('date')->nullable();
            $table->string('supprimer')->default(0);
            $table->foreignId('categorie_id')->references('id')->on('parametres')->constrained();
            $table->foreignId('user_id')->references('id')->on('users')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realisations');
    }
};
