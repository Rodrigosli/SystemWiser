<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    
    <div class="content">
        <div class="row ">
            <div class="col-md-4 m-6">
                <h3 class="pt-5">Minhas Ordens de Serviços</h3>
                <div class="row">
                    <label for="">Data de</label>
                    <input type="date" wire:model="dtde" >
                </div>
                <div class="row">
                    <label for="">Data ate</label>
                    <input type="date" wire:model="dtate">
                </div>
               <table class="table table-hover mt-10">
                <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Data</th>
                      <th scope="col">Cliente</th>
                      <th scope="col">Horas</th>
                      <th scope="col">Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($os as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{date("d/m/Y", strtotime($item->dtagenda)) }}</td>
                            <td>{{$item->cliente }}</td>
                            <td>{{gmdate('H:i', strtotime( $item->hora_fim ) - strtotime( $item->hora_inicio ) - strtotime( $item->hora_pausa )+ strtotime( $item->hora_traslado ))   }}</td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#modalaltOs"  wire:click="$emit('osActionAlt','alterar',{{$item->id}})" ><i class="far fa-edit"></i></a>
                                <a href="" data-bs-toggle="modal" data-bs-target="#deleteos"  wire:click="$emit('eventdel','del',{{$item->id}},'{{$item->cliente}}','{{$item->dtagenda}}')" ><i class="far fa-trash-alt"></i></a>
                                <!-- <a href=""><i class="far fa-trash-alt"></i></a> -->
                                <a href="/impos/{{$item->id}}" target="_blank" ><i class="fas fa-print"></i></a>
                            </td>
                        </tr>
                      @endforeach
                    
                      <tr>
                          <th>Total</th>
                          <td></td>
                          <td></td>
                          <th><span class="font-bold">{{ $totalhoras }}</span> </th>
                          <td></td>
                      </tr>
                   
                    
                  </tbody>
               </table>
                
            </div>
         
            <div class="col-md-7 m-4" wire:ignore>
                <div id='calendar'>

                </div>
            </div>
        </div>

    </div>
</div>



@livewire('movimentos.os.create-os')
@livewire('movimentos.os.alter-os')
@livewire('movimentos.os.imp-os')
@livewire('movimentos.os.deleta-os')

@push('component-scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
    <script>
        
            //# sourceURL=somename.js
            document.addEventListener('livewire:load', function() {
                var calendarEl = document.getElementById('calendar');
                var data =   @this.agendas;
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'pt-br',
                    buttonText: {
                        prev: "Anterior",
                        next: "Próximo",
                        prevYear: "Ano Anterior",
                        nextYear: "Próximo Ano",
                        today: "Hoje",
                        month: "Mês",
                        week: "Semana",
                        day: "Dia"
                    },
                    events: JSON.parse(data),
                    eventClick: function(info) {
                        Livewire.emit('osAction','alt',info.event.id);
                        $('#modalOs').modal('toggle');
                        // change the border color just for fun
                        info.el.style.borderColor = 'red';
                    },
                    height: 750,
                    dateClick: function(info) {
                        //alert(info.dateStr);
                        Livewire.emit('osAction','add','',info.dateStr);
                        $('#modalOs').modal('toggle');
                    },
                });
                calendar.render();
             }); 
             $(document).ready(function () {
                document.getElementById("impos").onclick = function () {
                    printElement(document.getElementById("printThis"));
                }
             });
             function printElement(elem) {
                var domClone = elem.cloneNode(true);
                
                var $printSection = document.getElementById("printSection");
                
                if (!$printSection) {
                    var $printSection = document.createElement("div");
                    $printSection.id = "printSection";
                    document.body.appendChild($printSection);
                }
                
                $printSection.innerHTML = "";
                $printSection.appendChild(domClone);
                window.print();
            }
    </script>
    

@endpush