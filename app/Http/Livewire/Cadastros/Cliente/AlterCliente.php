<?php

namespace App\Http\Livewire\Cadastros\Cliente;

use Livewire\Component;
use App\Models\User;
use App\Models\Cadastros\Empresa;
use App\Models\Cadastros\Cliente;
use Illuminate\Support\Facades\Auth;

class AlterCliente extends Component
{
    public $cliente;
    public $message;
    public $nome; 
    public $cgc;
    public $endereco;
    public $numero;
    public $cidade;
    public $complemento;
    public $estado;
    public $cep;
    public $telefone;
    public $email;
    public $inscricao_municipal;
    public $inscricao_estadual;
    public $razao_social;
    public $status;
    public $valor_hora;
    public $empresa_id;
    public function render()
    {
        $this->user = User::find(Auth::user()->id);
        $empresas = Empresa::where('id', $this->user->empresa_id)->get();
        return view('livewire.cadastros.cliente.alter-cliente',[
            'empresas'=>$empresas
        ]);
    }


    public function mount(Cliente $cli){
        $this->cliente = $cli;
        //dd($this->cliente);
    }

}
