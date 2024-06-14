<div>
    <h2>Cadastro de Projetos</h2>
     <button class="btn btn-primary btn-sm" wire:click="$emit('eventAction','add')" data-bs-toggle="modal" data-bs-target="#modalprojetos">Incluir</button>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projetos as $projeto)
                <tr>
                    <td>{{$projeto->id}}</td>
                    <td>{{$projeto->descricao}}</td>
                    <td>{{$projeto->status}}</td>
                    <td>
                        <a title="Editar" href="" data-bs-toggle="modal" data-bs-target="#modalprojetos" wire:click="$emit('eventAction','alterar',{{$projeto->id}})"><i class="far fa-edit"></i> Alterar</a>
                        <a title="Excluir" href="" data-bs-toggle="modal" data-bs-target="#deleteall" wire:click="$emit('eventdel','excluir','Projeto',{{$projeto->id}})"></i> Excluir</a>
                    </td>
                </tr> 
            @endforeach
          </tbody>
    </table>
</div>

@livewire('cadastros.projeto.modal-projetos')
@livewire('cadastros.modal-delete')