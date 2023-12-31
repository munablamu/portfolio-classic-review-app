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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable(false);
            $table->foreignId('recording_id')->constrained('recordings')->nullable(false);
            $table->string('title')->nullable(true);
            $table->text('content')->nullable(true);
            $table->integer('rate')->nullable(false);
            $table->integer('like')->integer(0)->nullable(false);
            $table->timestamps();

            $table->unique(['user_id', 'recording_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
