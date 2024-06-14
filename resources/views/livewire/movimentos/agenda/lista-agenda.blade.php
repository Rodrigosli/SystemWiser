<div>
    <div wire:ignore.self  class="modal fade" id="modalLisAgenda" tabindex="-1" aria-labelledby="modalOsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                            Agenda
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-user-tie"></i>    {{$consultor}}   <i class="far fa-calendar-alt"></i> <span class="fw-bold">{{ date("d/m/Y", strtotime($dt))  }} </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Cliente</th>
                                        <th>Local</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agendas as $item)
                                    <tr>
                                        <td>{{ date("d/m/Y", strtotime($item->dtagenda))  }}</td>
                                        <td>{{$item->cliente}}</td>
                                        <td>{{$item->local}}</td>
                                        <td>
                                            <a title="Editar" href="" data-bs-toggle="modal" data-bs-target="#altelist" wire:click="$emit('eventAction','add',{{$item->id}})"><i class="far fa-edit"></i> Alterar</a>
                                            {{-- <a title="Excluir" href="" data-bs-toggle="modal" data-bs-target="#modaldelete" ><i class="far fa-trash-alt"></i> Excluir</a> --}}
                                            <a title="Excluir" href="" data-bs-toggle="modal" data-bs-target="#dellista" wire:click="$emit('eventdel','excluir','Agenda',{{$item->id}})" ><i class="far fa-trash-alt"></i> Excluir</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>    
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('movimentos.agenda.alter-lista')

</div>    

@livewire('movimentos.agenda.del-lista')
