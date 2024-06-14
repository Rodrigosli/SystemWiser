

<div>
      
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h2>Cadastro de Clientes</h2>
     <button class="btn btn-primary btn-sm" wire:click="$emit('eventAction','add')" data-bs-toggle="modal" data-bs-target="#exampleModal">Incluir</button>
    <hr>
    <table class="table table-hover" id="datatable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Ação</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cgc}}</td>
                    <td>
                        {{-- @can('teste') --}}
                             <a title="Editar" href="" data-bs-toggle="modal" data-bs-target="#exampleModal" wire:click="$emit('eventAction','alterar',{{$cliente->id}})"><i class="far fa-edit"></i> Alterar</a>
                            <a title="Excluir" href="" data-bs-toggle="modal" data-bs-target="#modaldelete" wire:click="$emit('eventDelCli','excluir',{{$cliente->id}})"><i class="far fa-trash-alt"></i> Excluir</a>
                     {{-- @endcan --}}
                    </td>
                </tr> 
            @endforeach
          </tbody>
    </table>
</div>

@livewire('cadastros.cliente.modal-cliente')
@livewire('cadastros.cliente.delete-cliente')