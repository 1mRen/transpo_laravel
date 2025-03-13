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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->integer('vehicle_id', true);
            $table->string('plate_no', 50)->unique('plate_no');
            $table->string('type_of_vehicle', 100);
            $table->integer('capacity');
            $table->integer('status_id')->default(1)->index('fk_vehicle_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
