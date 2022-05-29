<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome_turno');
            $table->time('hr_inicio');
            $table->time('hr_fim');
            $table->time('hr_inicio_almoco');
            $table->time('hr_fim_almoco');
            $table->time('limite_hr_pausa_manha');
            $table->time('limite_hr_pausa_tarde');
            $table->integer('ativo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
