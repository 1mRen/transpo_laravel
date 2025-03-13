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
        Schema::create('driver', function (Blueprint $table) {
            $table->integer('driver_id', true);
            $table->string('full_name');
            $table->integer('age');
            $table->string('driver_license_no', 50)->unique('driver_license_no');
            $table->string('contact_no', 20);
            $table->integer('status_id')->index('status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
