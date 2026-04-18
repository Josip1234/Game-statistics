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
        Schema::table('sequel', function (Blueprint $table) {
            $table->dropColumn("publish_year");
            $table->integer("publish_year",false,true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sequel', function (Blueprint $table) {
              $table->dropColumn("publish_year");
            $table->tinyInteger("publish_year");
        });
    }
};
