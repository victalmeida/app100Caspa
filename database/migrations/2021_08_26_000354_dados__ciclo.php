<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DadosCiclo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dados_ciclos', function (Blueprint $table) {
                    $table->id();
                    $table->foreignId('Ciclo_id')->constrained('Ciclos');
                    $table->foreignId('Usuario_id')->constrained('Usuarios');
                    $table->dateTime('Horario_programado');
                    $table->string('Latitude');
                    $table->string('Longitude');
                    $table->boolean('Concluiu');
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
        Schema::dropIfExists('Dados_ciclos');
    }
}
