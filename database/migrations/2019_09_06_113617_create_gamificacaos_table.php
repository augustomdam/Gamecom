<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamificacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamificacaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banner');
            $table->text('desc_fases_pontos');
            $table->text('desc_desafios_estrategias');
            $table->text('desc_medalhas');
            $table->text('desc_ranking_premiacao');
            $table->bigInteger('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('cascade');
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
        Schema::dropIfExists('gamificacaos');
    }
}
