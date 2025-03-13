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
        Schema::create('vehicle_assignment', function (Blueprint $table) {
            $table->integer('assignment_id', true);
            $table->integer('vehicle_id')->index('vehicle_id');
            $table->integer('driver_id')->index('driver_id');
            $table->date('assigned_date');
            $table->date('end_date')->nullable();
            $table->integer('status_id')->nullable()->default(1)->index('status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_assignment');
    }
};
