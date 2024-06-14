

<div>
      
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <h2>Cadastro de Clientes</h2>
    <a href="/clientes/create"> <button class="btn btn-primary btn-sm"><i class="fas fa-building"></i>&nbsp&nbsp&nbsp&nbspAdicionar&nbsp&nbsp&nbsp&nbsp</button></a>
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
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->cgc}}</td>
                    <td>
                        {{-- @can('teste') --}}
                            {{-- <a title="Editar" href="{{route('alterar-clientes', $cliente->id)}}" >Alterar</a> --}}
                            <a title="Editar" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Alterar</a>
                            
                            {{-- <a title="Excluir" href="{{route('clientes.remove', $cliente->id)}}"><i class="fas fa-trash-alt"></i></a> --}}
                        {{-- @endcan --}}
                    </td>
                </tr> 
            @endforeach
          </tbody>
    </table>
</div>

@livewire('cadastros.cliente.modal-cliente')