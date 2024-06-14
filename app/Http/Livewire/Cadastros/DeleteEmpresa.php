<?php

namespace App\Http\Livewire\Cadastros;

use Livewire\Component;

class DeleteEmpresa extends Component
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
    
    public function render()
    {
        return view('livewire.cadastros.delete-empresa');
    }
}
