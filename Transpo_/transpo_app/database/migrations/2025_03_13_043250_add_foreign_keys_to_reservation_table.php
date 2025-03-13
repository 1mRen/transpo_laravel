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
        Schema::table('reservation', function (Blueprint $table) {
            $table->foreign(['applicant_id'], 'reservation_ibfk_1')->references(['applicant_id'])->on('applicant')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['vehicle_id'], 'reservation_ibfk_2')->references(['vehicle_id'])->on('vehicle')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['status_id'], 'reservation_ibfk_3')->references(['status_id'])->on('reservation_status')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservation', function (Blueprint $table) {
            $table->dropForeign('reservation_ibfk_1');
            $table->dropForeign('reservation_ibfk_2');
            $table->dropForeign('reservation_ibfk_3');
        });
    }
};
