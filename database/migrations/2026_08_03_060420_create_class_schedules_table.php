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
        Schema::create('class_schedules', function (Blueprint $table) {
           $table->id();

$table->foreignId('requester_id')
    ->constrained('users')
    ->cascadeOnDelete();

$table->foreignId('teacher_id')
    ->constrained('users')
    ->cascadeOnDelete();

$table->string('skill_name');
$table->dateTime('starts_at');
$table->unsignedInteger('duration_minutes')->default(60);
$table->string('mode')->default('online');
$table->string('status')->default('pending');
$table->text('notes')->nullable();

$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
