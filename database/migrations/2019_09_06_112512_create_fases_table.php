<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ordem');
            $table->string('tipo');
            $table->string('banner');
            $table->string('nomefase');
            $table->text('objetivo');
            $table->double('pontuacao');
            $table->text('avaliacao');
            $table->string('documento');
            $table->date('prazo');
            $table->bigInteger('medalha_id')->unsigned();
            $table->foreign('medalha_id')->references('id')->on('medalhas');
            $table->bigInteger('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas');
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
        Schema::dropIfExists('fases');
    }
}
