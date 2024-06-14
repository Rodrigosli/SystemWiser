<?php

namespace App\Http\Livewire\Cadastros\Cliente;

use Livewire\Component;
use App\Models\Cadastros\Cliente;
use App\Models\User;
use App\Models\Cadastros\Empresa;
use Illuminate\Support\Facades\Auth;

class ShowCliente extends Component
{
    public $message;
    public $titulo="Incluir";

    protected $listeners = ['$refresh'];
    
    public function render()
    {
        $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }
        

        $clientes = Cliente::get();
        $this->user = User::find(Auth::user()->id);
        $empresas = Empresa::where('id', $this->user->empresa_id)->get();
        return view('livewire.cadastros.cliente.show-cliente',[
            'clientes'=>$clientes,
            'empresas'=>$empresas,
        ]);
    }

    public function create(){
        dd($this->status);
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
         return redirect('/clientes');
     }
}
