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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('certificate')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('portfolio_link')->nullable();

            $table->enum('verification_status', [
                'pending',
                'verified',
                'rejected'
            ])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'certificate',
                'portfolio',
                'portfolio_link',
                'verification_status'
            ]);
        });
    }
};