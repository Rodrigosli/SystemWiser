<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItensPendencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_pendencias', function (Blueprint $table) {
            $table->id();
            $table->string('execucao')->nullable();
            $table->unsignedBigInteger('pendencias_id')->nullable();
            $table->foreign('pendencias_id')->references('id')->on('pendencias');
            $table->date('dtretorno');
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
        Schema::dropIfExists('itens_pendencias');
    }
}
