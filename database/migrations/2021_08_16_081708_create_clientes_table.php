<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("cgc");
            $table->string("endereco")->nullable();
            $table->string("numero")->nullable();
            $table->string("complemento")->nullable();
            $table->string("cidade")->nullable();
            $table->string("estado")->nullable();
            $table->string("cep")->nullable();
            $table->string("telefone");
            $table->string("email");
            $table->string("inscricao_municipal")->nullable();
            $table->string("inscricao_estadual")->nullable();
            $table->string("razao_social")->nullable();
            $table->string("status");
            $table->float('valor_hora', 11, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
