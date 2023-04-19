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
        Schema::create('person_dubs_character', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->nullable()
                ->cascadeOnDelete();
            $table->foreignId('character_id')->nullable()
                ->cascadeOnDelete();
            $table->timestamps();

            $table->foreign('person_id')->references('id')
                ->on('people')
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
        Schema::dropIfExists('person_dubs_character');
    }
};