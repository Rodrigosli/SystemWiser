<?php

namespace App\Http\Livewire\Cadastros\Projeto;

use Livewire\Component;
Use App\Models\Cadastros\Projeto;
Use App\Models\Cadastros\Cliente;
Use App\Models\Cadastros\Empresa;
use Illuminate\Support\Facades\Auth;

class ShowProjetos extends Component
{
    public function render()
    {
        $projetos = Projeto::get();
        return view('livewire.cadastros.projeto.show-projetos',
        [
            'projetos'=>$projetos,
        ]);
    }
}
