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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('gender')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('occ')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('add')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('batch_no');
            $table->string('phone');
            $table->string('shirt');
            $table->string('blood_group');
            $table->string('photo');
            $table->string('guest')->nullable();
            $table->string('regFee')->default(1000);
            $table->string('guestFee');
            $table->string('totalFee');
            $table->string('trxID')->unique();
            $table->string('status')->default(0);
            $table->string('auth')->default('auth');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};