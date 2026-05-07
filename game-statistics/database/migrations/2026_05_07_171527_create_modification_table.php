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
        Schema::create('modification', function (Blueprint $table) {
            $table->id();
            $table->string("name",50);
            $table->foreignId("game_id")->constrained("game")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("sequel_id")->nullable()->constrained("sequel")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modification');
    }
};
