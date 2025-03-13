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
        Schema::table('reserve_status_history', function (Blueprint $table) {
            $table->foreign(['reservation_id'], 'reserve_status_history_ibfk_1')->references(['reservation_id'])->on('reservation')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['status_id'], 'reserve_status_history_ibfk_2')->references(['status_id'])->on('reservation_status')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['updated_by'], 'reserve_status_history_ibfk_3')->references(['user_id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reserve_status_history', function (Blueprint $table) {
            $table->dropForeign('reserve_status_history_ibfk_1');
            $table->dropForeign('reserve_status_history_ibfk_2');
            $table->dropForeign('reserve_status_history_ibfk_3');
        });
    }
};
