<div>
   <h1>Pendencias</h1>
   <button class="btn btn-primary btn-sm" wire:click="$emit('eventAction','add')" data-bs-toggle="modal" data-bs-target="#incluipendencia">Incluir</button>
    <hr>
   <table class="table table-hover" id="datatable">
      <thead>
          <tr>
              <th>Id</th>
              <th>Status</th>
              <th>Cliente</th>
              <th>Descricao</th>
              <th>Inclusao</th>
              <th>Último Retorno</th>
              <th>Analista</th>
              <th>Responsável</th>
              <th>Ações</th>
          </tr>
        </thead>
        <tbody>
           @foreach ($pendencias as $pendencia)
              <tr>
                  <td>{{$pendencia->id}}</td>
                  
                  @if ($pendencia->status==0)
                        <td>{{"Pendente"}}</td>
                  @endif   
                  @if ($pendencia->status==1)
                        <td>{{"Em-Andamento"}}</td>
                  @endif 
                  @if ($pendencia->status==9)
                     <td>{{"Finalizado"}}</td>
               @endif      

   
                  <td>{{$pendencia->cliente}}</td>
                  <td>{{$pendencia->descricao}}</td>
                  <td>{{$pendencia->dtinclusao}}</td>
                  <td>{{$pendencia->dtultimoretorno}}</td>
                  <td>{{$pendencia->analista}}</td>
                  <td>{{$pendencia->responsavel}}</td>
                 
                  <td>
                       <a title="Editar" href="" data-bs-toggle="modal" data-bs-target="#incluipendencia" wire:click="$emit('eventAction','alterar',{{$pendencia->id}})"><i class="far fa-edit"></i> Alterar</a>
                       <a title="Excluir" href="" data-bs-toggle="modal" data-bs-target="#deleteall" wire:click="$emit('eventdel','excluir','User',{{$pendencia->id}})"><i class="far fa-trash-alt"></i>Excluir</a>  
                  </td>
              </tr> 
          @endforeach 
        </tbody>
  </table>
</div>

@livewire('cadastros.pendencias.inclui-pendencia')