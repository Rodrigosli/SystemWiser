<?php

namespace App\Http\Livewire\Movimentos\Conferencia;

use Livewire\Component;
use App\Models\Movimentos\Os;
use Illuminate\Support\Facades\Auth;
use DB;
class Conferencia extends Component
{
    public function render()
    {

        $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }

        $os = DB::table('oss as a')
        ->join('clientes as b', 'a.cliente_id', '=', 'b.id')
        ->join('users as c', 'a.user_id', '=', 'c.id')
                ->select('a.*','b.nome as cliente', 'c.name as nm_cons')
                ->get(); 

       // dd($os);


        return view('livewire.movimentos.conferencia.conferencia',
    [
        'os' => $os
    ]);
    }
}
