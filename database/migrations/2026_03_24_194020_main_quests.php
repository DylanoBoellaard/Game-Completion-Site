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
        Schema::create('mainQuests', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); // Foreign key to games table (shared primary key)
            $table->string('name');                             // Main quest name
            $table->text('description')->nullable();            // Main quest description
            $table->boolean('is_completed')->default(false);    // Whether the main quest is completed or not
            $table->dateTime('completion_date')->nullable();    // Date & time when the main quest was completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mainQuests');
    }
};
