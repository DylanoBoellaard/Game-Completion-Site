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
        Schema::create('sideQuests', function (Blueprint $table) {
            $table->id();                                       // Primary key
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade'); // Foreign key to games table (shared primary key)
            $table->string('name');                             // Side quest name
            $table->text('description')->nullable();            // Side quest description
            $table->boolean('is_completed')->default(false);    // Whether the side quest is completed or not
            $table->dateTime('completion_date')->nullable();    // Date & time when the side quest was completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sideQuests');
    }
};
