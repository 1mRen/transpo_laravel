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
        Schema::create('reserve_status_history', function (Blueprint $table) {
            $table->integer('history_id', true);
            $table->integer('reservation_id')->index('reservation_id');
            $table->integer('status_id')->index('status_id');
            $table->integer('updated_by')->index('updated_by');
            $table->timestamp('timestamp')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_status_history');
    }
};
