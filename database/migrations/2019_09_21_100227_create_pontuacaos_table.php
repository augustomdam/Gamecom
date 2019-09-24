<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePontuacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontuacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('ponto_obtido');
            $table->bigInteger('fase_id')->unsigned();
            $table->foreign('fase_id')->references('id')->on('fases');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('pontuacaos');
    }
}
