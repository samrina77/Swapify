<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('messages', 'sender_id')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->foreignId('sender_id')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('messages', 'sender_id')) {
            Schema::table('messages', function (Blueprint $table) {
                $table->dropConstrainedForeignId('sender_id');
            });
        }
    }
};