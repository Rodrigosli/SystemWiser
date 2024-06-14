<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oss', function (Blueprint $table) {
            $table->id();
            $table->longText('descricao');
            $table->string('hora_inicio', $precision = 0);
            $table->string('hora_fim', $precision = 0);
            $table->string('hora_pausa', $precision = 0);
            $table->string('hora_traslado', $precision = 0);
            $table->unsignedBigInteger('projeto_id')->nullable();
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('oss');
    }
}
