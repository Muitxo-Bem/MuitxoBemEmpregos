<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVagaEmpregosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaga_empregos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empregador_id');
            $table->string('nome');
            $table->text('descricao');
            $table->integer('quantidade_de_vagas')->unsigned();
            $table->text('local_de_trabalho');
            $table->text('requisitos');
            $table->double('faixa_salarial')->unsigned();
            $table->boolean('ativa')->default(true);
            $table->text('diferenciais')->nullable();

            $table->foreign('empregador_id')->references('id')->on('empregadors');
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
        Schema::dropIfExists('vaga_empregos');
    }
}
