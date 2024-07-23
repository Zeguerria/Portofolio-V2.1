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
        Schema::create('profil_habilitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habilitation_id')->default(0);
            $table->string('supprimer')->default(0);
            $table->foreign('habilitation_id')->references('id')->on('habilitations')->constrained();
            $table->unsignedBigInteger('profil_id')->default(0);
            $table->foreign('profil_id')->references('id')->on('profils')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_habilitations');
    }
};
