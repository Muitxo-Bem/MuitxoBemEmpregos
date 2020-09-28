<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaFormacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_formacaos', function (Blueprint $table) {
            $table->unsignedBigInteger('curriculo_id');
            $table->id();
            $table->String('area');

            $table->timestamps();

            $table->foreign('curriculo_id')->references('id')->on('curriculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_formacaos');
    }
}
