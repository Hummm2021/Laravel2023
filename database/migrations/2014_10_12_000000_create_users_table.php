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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('fonction')->nullable();
            $table->enum('profile', [ 'admin','technicien', 'utilisateur'])->default('utilisateur');            
            $table->string('password');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('phoneBureau')->nullable();
            $table->enum('approbation', [ 'APPROUVE', 'NON APPROUVE'])->default('NON APPROUVE');            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedBigInteger('direction_id')->nullable();
            $table->unsignedBigInteger('sous_direction_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
