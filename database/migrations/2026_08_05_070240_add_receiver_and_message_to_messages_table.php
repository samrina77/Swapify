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
        Schema::table('messages', function (Blueprint $table) {

            if (!Schema::hasColumn('messages', 'receiver_id')) {
                $table->unsignedBigInteger('receiver_id')->nullable();
            }

            if (!Schema::hasColumn('messages', 'message')) {
                $table->text('message')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {

            if (Schema::hasColumn('messages', 'receiver_id')) {
                $table->dropColumn('receiver_id');
            }

            if (Schema::hasColumn('messages', 'message')) {
                $table->dropColumn('message');
            }

        });
    }
};