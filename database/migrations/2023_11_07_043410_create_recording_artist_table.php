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
        Schema::create('recording_artist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recording_id')->constrained('recordings')->nullable(false);
            $table->foreignId('artist_id')->constrained('artists')->nullable(false);
            $table->timestamps();

            $table->unique(['recording_id', 'artist_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recording_artist');
    }
};
