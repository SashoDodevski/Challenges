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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('application_status_id');
            $table->unsignedBigInteger('history_status_id');
            $table->timestamps();
            $table->date('entry_date');
            $table->date('archived_at')->nullable();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('application_status_id')->references('id')->on('application_statuses');
            $table->foreign('history_status_id')->references('id')->on('history_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign('applications_client_id_foreign');
            $table->dropForeign('applications_application_status_id_foreign');
            $table->dropForeign('applications_history_status_id_foreign');
        });

        Schema::dropIfExists('applications');
    }
};
