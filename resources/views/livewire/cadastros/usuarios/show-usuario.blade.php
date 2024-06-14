<div>
    <h2>Cadastro de Usuários</h2>
    <button class="btn btn-primary btn-sm" wire:click="$emit('eventAction','add')" data-bs-toggle="modal" data-bs-target="#modalusuarios">Incluir</button>
   <hr>
   <table class="table table-hover">
       <thead>
           <tr>
               <th>Id</th>
               <th>Nome</th>
               <th>E-Mail</th>
               <th>Empresa</th>
           </tr>
         </thead>
         <tbody>
           -- @foreach ($usuarios as $usuario)
               <tr>
                   <td>{{$usuario->id}}</td>
                   <td>{{$usuario->name}}</td>
                   <td>{{$usuario->email}}</td>
                   <td>{{$usuario->nome}}</td>
                   <td>
                        <a title="Editar" href="" data-bs-toggle="modal" data-bs-target="#modalusuarios" wire:click="$emit('eventAction','alterar',{{$usuario->id}})"><i class="far fa-edit"></i> Alterar</a>
                        <a title="Excluir" href="" data-bs-toggle="modal" data-bs-target="#deleteall" wire:click="$emit('eventdel','excluir','User',{{$usuario->id}})"><i class="far fa-trash-alt"></i>Excluir</a>  
                   </td>
               </tr> 
           @endforeach 
         </tbody>
   </table>
</div>
</div>
@livewire('cadastros.usuarios.modal-usuarios')
@livewire('cadastros.modal-delete')