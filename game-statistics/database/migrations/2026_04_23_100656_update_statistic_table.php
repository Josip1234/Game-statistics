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
        Schema::table('statistics', function (Blueprint $table) {
            $table->foreignId("sequel_id")->nullable()->constrained('sequel')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dropConstrainedForeignId("game_id");
            $table->foreignId("game_id")->nullable()->constrained('game')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('statistics', function (Blueprint $table) {
            $table->dropConstrainedForeignId("game_id");
            $table->foreignId("game_id")->constrained('game')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dropConstrainedForeignId("sequel_id");
        });
    }
};
