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
        Schema::create('games', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->string('name');                             // Game name
            $table->text('description')->nullable();            // Game description
            $table->boolean('is_completed')->default(false);    // Whether the game is completed or not
            $table->dateTime('completion_date')->nullable();    // Date & time when the game was completed
            $table->integer('playtime')->default(0);            // Total playtime in minutes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
