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
        Schema::create('game_statistic', function (Blueprint $table) {
            $table->id();
            $table->foreignId("profile_id")->constrained("profile")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("ad_stat_id")->constrained("advanced_statistics")->cascadeOnDelete()->cascadeOnUpdate();
            $table->text("save_game_file")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_statistic');
    }
};
