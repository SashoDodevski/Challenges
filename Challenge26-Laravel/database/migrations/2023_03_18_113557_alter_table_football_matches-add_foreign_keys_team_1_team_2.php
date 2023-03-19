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
        Schema::table('football_matches', function (Blueprint $table) {
            $table->foreign('team_1_id')->references('id')->on('teams');
            $table->foreign('team_2_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('football_matches', function (Blueprint $table) {
            $table->dropForeign('football_matches_team_1_id_foreign');

            $table->dropForeign('football_matches_team_2_id_foreign');
        });
    }
};
