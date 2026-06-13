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
        Schema::create('game_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId("game_id")->constrained("game")->cascadeOnDelete()->cascadeOnUpdate();
            //$table->foreignId("sequel_id")->nullable()->constrained("sequel")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("genre_id")->constrained("genre")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game_genre', function (Blueprint $table) {
          Schema::dropIfExists('game_genre');
        });
    }
};
