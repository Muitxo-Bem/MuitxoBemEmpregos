<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculos', function (Blueprint $table) {
            $table->unsignedBigInteger('candidato_id');
            $table->id();
            $table->timestamps();
            $table->string('Info_Adicional');
            //$table->blob('pdf');
            $table->string('Experiencia');


            $table->foreign('candidato_id')->references('id')->on('candidatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculos');
    }
}
