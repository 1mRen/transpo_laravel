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
        Schema::table('vehicle_assignment', function (Blueprint $table) {
            $table->foreign(['vehicle_id'], 'vehicle_assignment_ibfk_1')->references(['vehicle_id'])->on('vehicle')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['driver_id'], 'vehicle_assignment_ibfk_2')->references(['driver_id'])->on('driver')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['status_id'], 'vehicle_assignment_ibfk_3')->references(['status_id'])->on('assignment_status')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_assignment', function (Blueprint $table) {
            $table->dropForeign('vehicle_assignment_ibfk_1');
            $table->dropForeign('vehicle_assignment_ibfk_2');
            $table->dropForeign('vehicle_assignment_ibfk_3');
        });
    }
};
