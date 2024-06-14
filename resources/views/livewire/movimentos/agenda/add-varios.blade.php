<div>
    <div>
        <div wire:ignore.self  class="modal fade" id="modalvariasagenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                                Agendamento em lote
                               
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="card">
                            <div class="card-header">
                            Agenda do 
                            </div>
                            <div class="card-body">
                                <div class="row form-group">
                                    <label for="descricaopraca">Descrição</label>
                                    <textarea class="form-control"  wire:model="descricao"> </textarea>

                                    {{-- <input type="text" class="form-control"  wire:model="descricao"> --}}
                                </div>
                                
                                <div class="row form-group">
                                    <label for="descricaopraca">Cliente</label>
                                    <select class="form-control" id="cliente" wire:model="cliente_id" name="cliente"  wire:click="change($event.target.value)">
                                        <option></option>
                                        @foreach ($clientes as $item)
                                        <option value="{{$item->id}}">{{$item->nome}}</option>
                                            {{-- @if ($item->id==$cliente_id)
                                                <option value="{{$item->id}}" selected>{{$item->nome}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->nome}}</option>
                                            @endif   --}}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Projeto</label>
                                    <select class="form-control" id="projeto" wire:model="projeto_id">
                                        <option></option>
                                        @foreach ($projetos as $item)
                                            <option value="{{$item->id}}">{{$item->descricao}}</option>
                                            {{-- @if ($item->id==$projeto_id)
                                                <option value="{{$item->id}}" selected>{{$item->descricao}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->descricao}}</option>
                                            @endif   --}}
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Usuário</label>
                                    <select class="form-control" disabled wire-model="id_usuario_t">
                                        <option></option>
                                        @foreach ($usuarios as $item)
                                        <option values="{{$item->id}}">{{$item->name}}</option>
                                            @if ($item->id==$id_usuario_t)
                                                <option values="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option values="{{$item->id}}">{{$item->name}}</option>
                                            @endif  
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Hora Início</label>
                                    <input type="text" class="form-control"   wire:model="hora_inicio">
                                </div>
                         
                                <div class="row form-group">
                                    <label for="descricaopraca">Hora Fim</label>
                                    <input type="text" class="form-control"   wire:model="hora_fim">
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Atendimento</label>
                                    <select class="form-control" wire:model="local">
                                        <option></option>
                                        <option values="Remoto">Remoto</option>
                                        <option values="Presencial">Presencial</option>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Faturamento</label>
                                    <select class="form-control" wire:model="fatura">
                                        <option></option>
                                        <option value="FATURADA">FATURADA</option>
                                        <option value="INVESTIMENTO CLIENTE ">INVESTIMENTO CLIENTE</option>
                                        <option value="PROJETO FECHADO">PROJETO FECHADO</option>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Faturar Para</label>
                                    <select class="form-control" wire:model="empresa">
                                        <option></option>
                                        <option value="ERP">ERP</option>
                                        <option value="WEB">WEB</option>
                                    </select>
                                </div>
                                <div class="row form-group">
                                    <label for="descricaopraca">Data</label>
                                    <div class='fields'>
                                        @foreach ($dtMult as $item)
                                            <button class="btn btn-outline-danger btn-sm p-2 btn-remove" id="{{$item}}">{{$item}} </button>
                                        @endforeach
                                    </div>
                                    <br>
                                    <div>
                                    
                                        <button class="btn btn-primary btn-sm" id="datepicker-button"  >Add Data</button>
                                    </div>    
                                </div>
                                </br>
                                <div class="row p-2">    
                                    <button class="btn btn-primary" wire:click="submit">
                                        <i class="fas fa-cloud-upload-alt"></i> 
                                            Salvar
                                    </button>
                                </div>
                                {{-- </form> --}}
                                
                            </div>
                        </div>   
                        <input type="hidden" id="datepicker"  wire:model="dtMult" > 
                        {{-- <hr>
                        <p>{{ $id_user }}</p> 
                        <div class='fields'>

                        </div>
                        
                         --}}
                    </div>
                       
                </div>
            </div>
        </div>
    </div>
</div>

@push('component-scripts')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
        var picker = new Pikaday({ 
            field: document.getElementById('datepicker'),
            trigger: document.getElementById('datepicker-button'),
            format: 'DD/MM/YYYY',
            toString(date, format) {
                // you should do formatting based on the passed format,
                // but we will just return 'D/M/YYYY' for simplicity
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return `${day}/${month}/${year}`;
            },
            onSelect: function() {
                console.log('onSelect this::')
                console.log(picker.toString());
                var start = 1;
                window.livewire.emit('addData',picker.toString() );
                // $(".fields").append("<button class='btn btn-remove'>"+ picker.toString() +"</button>");
                $(".fields").append('<button class="btn btn-outline-danger btn-sm p-2 btn-remove" id="'+picker.toString()+'">'+ picker.toString() +'</button>');
                
                $('body').on('click', '.btn-remove', function() {
                    window.livewire.emit('remData',this.id );
                    $(this).remove();
                });

            },
            i18n: {
                previousMonth : 'Anterior',
                nextMonth     : 'Próximo',
                months        : ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                weekdays      : ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                weekdaysShort : ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb']
            }
         });

    </script>
@endpush
    
