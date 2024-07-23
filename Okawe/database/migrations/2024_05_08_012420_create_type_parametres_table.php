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
        Schema::create('type_parametres', function (Blueprint $table) {
            $table->id();
            $table->string('code',100)->nullable();
            $table->string('libelle',300)->nullable();

            $table->text('description')->nullable();
            $table->string('supprimer')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_parametres');
    }
};
