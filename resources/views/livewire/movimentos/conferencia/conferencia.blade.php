<div>
    <h2>Ordens de Serviço - Conferência</h2>
       <hr>
   <table class="table table-hover">
       <thead>
           <tr>
               <th>Id</th>
               <th>Data</th>
               <th>Consultor</th>
               <th>Inicio</th>
               <th>Pausa</th>
               <th>Fim</th>
               <th>Traslado</th>
               <th>Total</th>
           </tr>
         </thead>
         <tbody>
           @foreach ($os as $item)
               <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->nm_cons}}</td> 
                   <td>{{date("d/m/Y", strtotime($item->dtagenda))}}</td>
                   <td>{{$item->hora_inicio}}</td>
                   <td>{{$item->hora_pausa}}</td>
                   <td>{{$item->hora_fim}}</td>
                   <td>{{$item->hora_traslado}}</td>
                   <td>{{gmdate('H:i',(strtotime( $item->hora_fim ) - strtotime( $item->hora_inicio ) - strtotime( $item->hora_pausa )+ strtotime( $item->hora_traslado ))) }}</td>
      
               </tr> 
           @endforeach
         </tbody>
   </table>
</div>
