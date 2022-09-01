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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('nome_atendente');
            $table->string('sobrenome_atendente');
            $table->string('email')->unique();
            $table->string('password');
            /*$table->timestamp('email_verified_at')->nullable();*/
            $table->boolean('is_supervisor');
            $table->boolean('is_adm');
            $table->integer('ddd')->nullable();
            $table->integer('numero_celular')->nullable();
            $table->boolean('ativo');
            $table->boolean('esta_em_pausa')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
