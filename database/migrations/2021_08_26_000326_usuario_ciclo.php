<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsuarioCiclo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Usuarios_ciclos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Usuario_id')->constrained('Usuarios');
            $table->foreignId('Ciclos_id')->constrained('Ciclos');
            $table->enum('status', ['aberto', 'fechado']);
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
        Schema::dropIfExists('Usuarios_ciclos');
    }
}
