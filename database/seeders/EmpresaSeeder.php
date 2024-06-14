<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('empresas')->insert([
            'nome' => 'Harpia Consultoria',
            'cnpj' => '9999999999999',
            'endereco' => 'Av. João Gualberto',
            'numero' => '1881',
            'complemento' => ' 14º andar',
            'bairro' => 'Juveve',
            'cep' => '80030001',
            'cidade' => 'Curitiba',
            'inscricao_numicipal' =>'ISENTO' ,
            'inscricao_estadual' => 'ISENTO'
        ]);
    }
}
