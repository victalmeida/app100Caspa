<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ciclo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ciclos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Produto_id')->constrained('Produtos')->onDelete('cascade');
            $table->integer('Porcao');
            $table->string('Unidade_medida');
            $table->integer('Repeticoes_ao_dia');
            $table->integer('Quantidade_dias_ciclo');
            $table->integer('Quantidade_total_produto');
            $table->boolean('Ativo');
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
        Schema::dropIfExists('Ciclos');
    }
}
