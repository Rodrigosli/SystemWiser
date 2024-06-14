<?php

namespace App\Http\Livewire\Cadastros\Usuarios;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

Use App\Models\User;
use DB;
class ShowUsuario extends Component
{
    public function render()
    {
        $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }
        $usuarios = DB::table('users as a')
            ->join('empresas as b', 'a.empresa_id', '=', 'b.id')
            // ->select(['a.id AS uid'],['b.nome'],['a.*'])
            ->select(DB::raw( 'a.*,b.nome' ) )
            ->get();
        return view('livewire.cadastros.usuarios.show-usuario',
        [
            'usuarios'=>$usuarios
        ]);
    }
}
