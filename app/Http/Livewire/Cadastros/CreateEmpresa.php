<?php

namespace App\Http\Livewire\Cadastros;

use Livewire\Component;
use App\Models\Cadastros\Empresa;

class CreateEmpresa extends Component
{
    public $nome;
    public $cnpj;
    public $endereco;
    public $numero;
    public $cidade;
    public $complemento;
    public $bairro;
    public $estado;
    public $cep;
    public $inscricao_numicipal;
    public $inscricao_estadual;
    
    protected $rules = [
        'nome'      =>  'required',
        'cnpj'      =>  'required',
        'endereco'  =>  'required',
        'cidade'    =>  'required',
        'numero'    =>  'required', 
        'bairro'    =>  'required',
        'cep'       =>  'required',
    ];

    public function render()
    {
       
        return view('livewire.cadastros.create-empresa');
    }

    public function create(){

        //$this->validate();
        
        // Empresa::create(['nome'=>"Rodrigo","cnpj"=>"9","endereco"=>"teste","numero"=>"123","complemento"=>"casa","bairro"=>"cewbtri", "cep"=>"88888888", "inscricao_municipal"=>"isento", "inscricao_estadual"=>"isento"]);

        
        Empresa::create([
            'nome' => $this->nome, 
            'cnpj' => $this->cnpj,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'cep' => $this->cep,
            'inscricao_numicipal' => $this->inscricao_numicipal,
            'inscricao_estadual' => $this->inscricao_estadual,
        ]); 

        $this->reset(); 
        return redirect('/empresas');
    }
}
