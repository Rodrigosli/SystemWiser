<?php

namespace App\Http\Livewire\Cadastros\Pendencias;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
Use App\Models\Cadastros\Pendencia;
use DB;

class ShowPendencias extends Component
{
    public function render()
    {
         $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }
        $pendencias = DB::table('pendencias as a')
        ->join('clientes as b', 'a.cliente_id', '=', 'b.id')
        ->join('users as c', 'a.analista_id', '=', 'c.id')
        ->join('users as d', 'a.analistaresp_id', '=', 'd.id')
            ->select('a.*','b.nome as cliente','c.name as analista','d.name as responsavel')
            ->get(); 

        return view('livewire.cadastros.pendencias.show-pendencias',
        [
            'pendencias'=>$pendencias
        ]);
    }
}
