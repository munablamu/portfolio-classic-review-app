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
        Schema::create('recordings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('music_id')->constrained('musics')->nullable(false);
            $table->string('title')->nullable(false);
            $table->dateTime('release_date')->nullable(true);
            $table->string('catalogue_no')->nullable(false);
            $table->string('jacket_filename')->nullable(true);
            $table->float('average_rate', 2, 1)->default(0.0)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordings');
    }
};
