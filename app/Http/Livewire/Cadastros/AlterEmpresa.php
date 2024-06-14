<?php

namespace App\Http\Livewire\Cadastros;
use App\Models\Cadastros\Empresa;
use Livewire\Component;

class AlterEmpresa extends Component
{
    public $Empresa_id;
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
    public $emp;

    public function mount(Empresa $emp){
     
        dd($emp);
    }

    public function render()
    {
        return view('livewire.cadastros.alter-empresa');
    }
}
