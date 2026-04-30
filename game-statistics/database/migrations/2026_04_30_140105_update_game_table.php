<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * in future versions if game need to have multiple genres, 
     * we need additional table which will have id from genre and 
     * id from game to have M:M connection 
     * for now, if game has multiple genres, 
     * we can mark it as mixed or something like that
     */
    public function up(): void
    {
        Schema::table('game', function (Blueprint $table) {
           $table->foreignId("genre_id")->nullable()->constrained('genre')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('game', function (Blueprint $table) {
              $table->dropConstrainedForeignId("genre_id");
        });
    }
};
