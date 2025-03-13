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
        Schema::create('reservation', function (Blueprint $table) {
            $table->integer('reservation_id', true);
            $table->integer('applicant_id')->index('applicant_id');
            $table->integer('vehicle_id')->index('vehicle_id');
            $table->date('date_of_use');
            $table->string('departure_area');
            $table->string('destination');
            $table->time('departure_time');
            $table->time('return_time');
            $table->text('purpose');
            $table->integer('status_id')->nullable()->default(1)->index('status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
