<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class TiposUsuariosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuarios')->insert([
            'descricao' => 'Administrador',
        ]);
        DB::table('tipo_usuarios')->insert([
            'descricao' => 'Coordenador',
        ]);
        DB::table('tipo_usuarios')->insert([
            'descricao' => 'Consultor',
        ]);
    }
}
