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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('email')->unique();;
            $table->string('phone_number');
            $table->unsignedBigInteger('volunteer_position_id');
            $table->text('details');
            $table->string('doc1')->nullable();
            $table->timestamps();

            $table->foreign('volunteer_position_id')->references('id')->on('volunteer_positions');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('volunteers', function (Blueprint $table) {
            $table->dropForeign('volunteers_volunteer_position_id_foreign');
        });
        Schema::dropIfExists('volunteers');
    }
};
