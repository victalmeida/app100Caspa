<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuarios_produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Usuario_id')->constrained('Usuarios');
            $table->foreignId('Produto_id')->constrained('Produtos');
            $table->string('Codigo_de_barras');
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
        Schema::dropIfExists('Usuarios_produtos');
    }
}
