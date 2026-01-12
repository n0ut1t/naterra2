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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->integer('capitlo');
            $table->integer('nivel');
            $table->integer('xp'); //puntos
            $table->string('recompensa')->nullable(); //solo las especiales tienen recompensa
            $table->integer('respuestas');
            $table->integer('correcta');
            $table->string("tipo");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preguntas');
    }
};
