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
        Schema::create('sous_directions', function (Blueprint $table) {
            $table->id();
            $table->string('initial');
            $table->string('name');
            $table->timestamps();
            $table->unsignedBigInteger('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->unsignedBigInteger('sous_directeur_id')->nullable();
            $table->foreign('sous_directeur_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_directions');
    }
};
