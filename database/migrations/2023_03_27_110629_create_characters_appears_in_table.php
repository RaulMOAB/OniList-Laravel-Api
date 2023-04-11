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
        Schema::create('characters_appears_in', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')
                ->cascadeOnDelete();
            $table->foreignId('character_id')
                ->cascadeOnDelete();
            $table->string('role');
            $table->timestamps();

            $table->foreign('media_id')->references('id')
                ->on('medias')
                ->cascadeOnDelete();
            $table->foreign('character_id')->references('id')
                ->on('characters')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters_appears_in');
    }
};