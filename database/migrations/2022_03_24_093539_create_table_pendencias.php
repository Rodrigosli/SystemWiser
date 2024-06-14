<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePendencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendencias', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->nullable();
            $table->date('dtinclusao');
            $table->date('dtultimoretorno')->nullable();;
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->unsignedBigInteger('analista_id')->nullable();
            $table->foreign('analista_id')->references('id')->on('users');
            $table->unsignedBigInteger('analistaresp_id')->nullable();
            $table->foreign('analistaresp_id')->references('id')->on('users');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pendencias');
    }
}
