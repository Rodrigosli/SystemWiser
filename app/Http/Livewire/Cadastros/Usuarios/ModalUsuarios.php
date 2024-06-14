<?php

namespace App\Http\Livewire\Cadastros\Usuarios;

use Livewire\Component;
use App\Models\User;
use App\Models\Cadastros\Empresa;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Hash;

class ModalUsuarios extends Component
{
    public $action;
    public $usuario_id;
    public $nome;
    public $email;
    public $senha;
    public $empresa_id;
    public $tipo_usuarios_id;


    protected $listeners = ['eventAction'];

    public function render()
    {
        $emp = Empresa::get();
        $acesso = TipoUsuario::get();
        return view('livewire.cadastros.usuarios.modal-usuarios',
        [
            'empresas'=> $emp,
            'acessos' => $acesso,
        ]);
    }

    public function eventAction($action, $usuario_id='')
    {   $this->reset();
        $this->$action = $action;
        if($usuario_id){
             $this->edit($usuario_id);
        }
    }
    public function submit()
    {
        $this->createOrUpdate();
    }
    public function createOrUpdate()
    {
        //dd( $this->tipo_usuarios_id);
        User::updateOrCreate([
          'id'=> $this->usuario_id  
        ],[
            'name' => $this->nome,
            'email' => $this->email,
            'empresa_id'=> $this->empresa_id,
            'tipo_usuarios_id'=> $this->tipo_usuarios_id,
            'password'=> Hash::make($this->senha),
        ]);

        $this->emitTo('livewire.cadastros.usuario.show-usuario','$refresh');
        $this->emit('modalClose','#modalusuarios');
        $this->reset(); 
        return redirect('/usuarios');
    }
    public function edit($usuario_id)
    {
        
        $usr = User::find($usuario_id);
        $this->usuario_id=$usr->id;
        $this->nome=$usr->name;
        $this->email=$usr->email;
        $this->tipo_usuarios_id =$usr->tipo_usuarios_id;
        $this->empresa_id = $usr->empresa_id;
       // dd($usr->empresa_id);
       
}
}
