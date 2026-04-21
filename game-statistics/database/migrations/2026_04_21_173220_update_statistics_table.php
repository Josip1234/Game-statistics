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
            $table->date("started_playing")->after("hours_played")->nullable();
            $table->date("ended_playing")->after("started_playing")->nullable();
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('statistics', function (Blueprint $table) {
            $table->dropColumn("started_playing");
            $table->dropColumn("ended_playing");
        });
    }
};
