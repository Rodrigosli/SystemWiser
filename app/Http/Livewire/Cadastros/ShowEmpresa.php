<?php

namespace App\Http\Livewire\Cadastros;

use Livewire\Component;
use App\Models\Cadastros\Empresa;
use Illuminate\Support\Facades\Auth;

class ShowEmpresa extends Component
{
    public $message;
    public $nome1="";
    public $modal='sts';
    public function render()
    {
        $acesso = "1"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }
        
        $empresas = Empresa::get();
        //dd($empresas);
        return view('livewire.cadastros.show-empresa',[
            'empresas'=>$empresas
        ]);
    }

    public function alterar($empresas){
        //dd($empresas);

        return redirect()->to('/empresas/alterar/'.$empresa->id);

        // return view('livewire.cadastros.alter-empresa',[
        //     'empresas'=>$empresas
        // ]);
    }

    public function delete($idEmp){
        $reg = Empresa::find($idEmp);
        $reg->delete();

    }
}
