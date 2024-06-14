<?php

namespace App\Http\Livewire\Relatorios;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cadastros\
{
    Cliente,
};
use Livewire\Component;
use App\Exports\OsExport;
use Maatwebsite\Excel\Facades\Excel;

class OsEmitida extends Component
{


    public $dtDe;
    public $dtAte;
    public $user_id=0;
    public $cliente_id=0;


    public function render()
    {
        $acesso = "12"; 

        $result = strrpos ($acesso, Auth::user()->tipo_usuarios_id);
        if (!is_int($result))
        {
            abort(403);
        }
        $clientes = Cliente::get();
        $analistas = User::get();
    
        return view('livewire.relatorios.os-emitida',
        [
            'clientes'=>$clientes,
            'analistas' => $analistas,
        ]);
    }

    public function submit(){
    
        return Excel::download(new OsExport($this->dtDe,$this->dtAte,$this->cliente_id,$this->user_id), 'Relacao_Os'.date('d_m_Y').'.xlsx');
      
    }

    public function export() 
    {
        return Excel::download(new OsExport, 'users.xlsx');
    }
}
