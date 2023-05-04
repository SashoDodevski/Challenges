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
        Schema::create('donation_equipment', function (Blueprint $table) {
            $table->unsignedBigInteger('donation_id');
            $table->unsignedBigInteger('equipment_id');
            $table->timestamps();

            $table->foreign('donation_id')->references('id')->on('donations')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donation_equipment', function (Blueprint $table) {
            $table->dropForeign('donation_equipment_donation_id_foreign');
            $table->dropForeign('donation_equipment_equipment_id_foreign');
        });

        Schema::dropIfExists('donation_equipment');
    }
};
