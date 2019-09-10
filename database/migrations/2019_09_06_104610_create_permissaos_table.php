<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissaos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('funcaos_permissaos', function (Blueprint $table) {
            $table->bigInteger('funcao_id')->unsigned();
            $table->foreign('funcao_id')
                    ->references('id')->on('funcaos');
            $table->bigInteger('permissao_id')->unsigned();
            $table->foreign('permissao_id')
                    ->references('id')->on('permissaos');
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
        Schema::dropIfExists('permissaos');
    }
}
