<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Cliente</th>
            <th>Analista</th>
            <th>Hora Início</th>
            <th>Hora Fim</th>
            <th>Hora Pausa</th>
            <th>Hora Traslado</th>
            <th>Total</th>
            <th>Projeto</th>
            <th>Fatura</th>
            <th>Empresa - Faturar</th>
            <th>Execução</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($planilha as $oss)
            <tr>
                <td>{{ $oss->id }}</td>
                <td>{{ $oss->dtagenda }}</td>
                <td>{{ $oss->nome }}</td>
                <td>{{ $oss->name }}</td>
                <td>{{ $oss->hora_inicio }}</td>
                <td>{{ $oss->hora_fim }}</td>
                <td>{{ $oss->hora_pausa }}</td>
                <td>{{ $oss->hora_traslado }}</td>
                <td>{{ TRIM(gmdate('H:i',(strtotime( $oss->hora_fim ) - strtotime( $oss->hora_inicio ) - strtotime( $oss->hora_pausa )+ strtotime( $oss->hora_traslado )))) }}</td>
                <td>{{ $oss->projeto }}</td>
                <td>{{ $oss->fatura }}</td>
                <td>{{ $oss->empresa }}</td>
                <td>{{ $oss->execucao }}</td>
                
            </tr>
        @endforeach
    </tbody>