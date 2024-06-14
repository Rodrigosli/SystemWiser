<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAgendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendas', function (Blueprint $table) {

            $table->string('descricao');
            $table->date('dtagenda');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('agendas', function (Blueprint $table) {
            $table->dropColumn('descricao', 'user_id','cliente_id');
            $table->dropForeign('agendas_cliente_id_foreign');
            $table->dropForeign('agendas_user_id_foreign');
            $table->dropIndex('agendas_cliente_id_foreign');
            $table->dropIndex('agendas_user_id_foreign');

        });
    }
}
