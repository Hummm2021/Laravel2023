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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->enum('status', ['ouvert', 'en cours', 'fermé'])->default('ouvert');
            // $table->string('priority')->default('normal');
            // $table->string('category')->default('general');
            $table->string('author_name');
            $table->string('author_email');
            $table->timestamps();
        });
    }
    // Schema::table('table_name', function (Blueprint $table) {
    //     $table->enum('status', ['ouvert', 'en cours', 'fermé'])->default('ouvert');
    // });
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
