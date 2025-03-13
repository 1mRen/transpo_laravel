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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id', true);
            $table->string('full_name');
            $table->string('email')->unique('email');
            $table->string('username', 50)->unique('username');
            $table->string('password_hash');
            $table->enum('role', ['Admin', 'Applicant'])->default('Applicant');
            $table->integer('applicant_id')->nullable()->index('applicant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
