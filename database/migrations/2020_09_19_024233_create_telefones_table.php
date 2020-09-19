<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefones', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->unsignedBigInteger('empregador_id')->nullable();
            $table->string('telefone_primario')->unique();
            $table->string('telefone_secundario')->unique();

            $table->timestamps();

            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->foreign('empregador_id')->references('id')->on('empregadors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefones');
    }
}
