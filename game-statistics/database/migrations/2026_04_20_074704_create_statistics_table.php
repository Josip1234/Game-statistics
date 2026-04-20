<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This table represents basic statistic for each played game
     * Will have additional statistic table advanced will have a additional table
     * with prefix of the game for example gran turismo can have different statistic 
     * than gta series so we need duplicate table or just a table with a row which will
     * have json array?
     */
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId("game_id")->constrained('game')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("game_progress",50)->nullable();
            $table->integer("hours_played");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
