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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->string('type_depannage')->nullable();
            $table->string('nature_probleme')->nullable();
            $table->text('operation_effectuee')->nullable();
            $table->enum('status', ['RESOLU', 'NON RESOLU', 'EN COURS'])->default('EN COURS');
            $table->dateTime('date_depannage');
            $table->timestamps();
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
