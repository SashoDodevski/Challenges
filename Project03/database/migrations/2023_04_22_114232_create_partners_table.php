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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('partner_url');
            $table->unsignedBigInteger('partner_type_id');
            $table->timestamps();

            $table->foreign('partner_type_id')->references('id')->on('partner_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropForeign('partners_partner_type_id_foreign');
        });

        Schema::dropIfExists('partners');
    }
};
