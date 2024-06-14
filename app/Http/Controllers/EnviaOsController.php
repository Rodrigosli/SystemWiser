<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Movimentos\Os;
use App\Models\Cadastros\Cliente;
use App\Models\Cadastros\Projeto;
use App\Models\User;

class EnviaOsController extends Controller

{

    public function imprimir($id)
    {   
       $oss = Os::find($id);
       $cliente = Cliente::find($oss->cliente_id);
       $projeto = Projeto::find($oss->projeto_id);
       $analista = User::find($oss->user_id);    
         
        return view('emails.teste',
        [
            "os"=>$oss,
            "cliente"=>$cliente,
            "projeto"=>$projeto,
            "analista"=>$analista
        ]);
    }
}