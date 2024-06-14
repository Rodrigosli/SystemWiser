<?php

namespace App\Http\Livewire\Cadastros\Cliente;

use Livewire\Component;
use App\Models\User;
use App\Models\Cadastros\Empresa;
use App\Models\Cadastros\Cliente;
use Illuminate\Support\Facades\Auth;

class CreateCliente extends Component
{

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
    public $cliente_id;    


    public function render()
    {   
        $this->user = User::find(Auth::user()->id);
        $empresas = Empresa::where('id', $this->user->empresa_id)->get();
        return view('livewire.cadastros.cliente.create-cliente',[
            'empresas'=>$empresas
        ]);
    }

    public function create(){
       // dd($this->status);
        Cliente::create([
        'nome' => $this->nome,
        'cgc' => $this->cgc,
        'endereco' => $this->endereco,
        'numero' => $this->numero,
        'cidade' => $this->cidade,
        'complemento' => $this->complemento,
        'estado' => $this->estado,
        'cep' => $this->cep,
        'telefone' => $this->telefone,
        'email' => $this->email,
        'inscricao_municipal' => $this->inscricao_municipal,
        'inscricao_estadual' => $this->inscricao_estadual,
        'razao_social' => $this->razao_social,
        'status' => $this->status,
        'valor_hora' => $this->valor_hora,
        'empresa_id' => $this->empresa_id
        ]);
        $this->reset(); 
        return redirect('/empresas');
    }

public function alterar($id_cliente)
{
    # code...
}


}
