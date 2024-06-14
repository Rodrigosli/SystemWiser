<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            
        </style>
    </head>
    <body>
            
        <div class="container-fluid">
            
            <div class="border rounded mt-5">
                <div class="text-center">
                    <div class="fw-bold">Ordem de Serviço</div>  
                </div>
            </div>
            <div class="border mt-2 rounded ps-2">
                <div class="d-flex justify-content-between">
                        
                    <div class="col form-text">
                        Nome
                    </div>
                    <div class="col form-text">
                        Projeto
                    </div>
                    <div class="col form-text">
                        Num. Os:
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col fw-bold">
                        {{$cliente->nome}}
                    </div>
                    <div class="col fw-bold">
                       {{$projeto->descricao}}
                    </div>
                    <div class="col fw-bold">
                        {{$os->id}}
                    </div>
                </div>
           
                <div class="d-flex justify-content-between">
                    <div class="col form-text">
                        Data
                    </div>
                    <div class="col form-text">
                        Início
                    </div>
                    <div class="col form-text">
                        Pausa
                    </div>
                    <div class="col form-text">
                        Fim
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col fw-bold">
                        {{date("d/m/Y", strtotime($os->dtagenda)) }}
                    </div>
                    <div class="col fw-bold">
                        {{$os->hora_inicio}}
                    </div>
                    <div class="col fw-bold">
                        {{$os->hora_pausa}}
                    </div>
                    <div class="col fw-bold">
                        {{$os->hora_fim}}
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col form-text">
                        Analista
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col fw-bold">
                        {{$analista->name}}
                    </div>
                </div>
            </div> 
            <div class="col form-text">
                Descrição Atitidades
            </div>
            <div class="border h-60 ps-2">
                <p>
                    
                    {!! nl2br($os->execucao)!!}
                </p>
            </div>
            <br>
            <hr>
            <br>

        </div>         
     
{{--       
    
    <p> Cliente:  <span class="fw-bold">Nome Do cliente</span></p>
                <p> Projeto:  <span class="fw-bold">Descricao do projeto</span></p>
                <div class="text-start mb-0">
                    <p class="mb-0">Cliente:  <span class="fw-bold">Nome Do cliente</span></p>
                </div>
                <div class="text-end">
                    <p class="mb-0">Projeto: <span class="fw-bold">Descricao do projeto</span></p>
                </div>
        </div>
                <div class="d-flex flex-row">
                    <div class="text-start ps-2">Hora Início: <span class="fw-bold">00:00</span></div> 
                    <div class="text-center">Hora Pausa:  <span class="fw-bold">00:00</span></div>
                    <div class="text-end pe-2">Hora Fim:  <span class="fw-bold">00:00</span></div>
                </div>
            </div> 
            
            
            <div class="text-start form-text ps-5">Cliente</div>
                    <div class="text-end form-text pe-5">Projeto</div>
                    <div class="row">
                        <div class="d-flex">
                            <div class="text-start ps-2 fw-bold">NOME CLIENTE</div> 
                            <div class="text-end pe-2 fw-bold" ">DESCRICAO PROJETO</div>
                        </div> 
                    </div>   --}}
            
         
           
       
            {{-- <div class="row border rounded-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="row m-1">Cliente</div>
                            <div class="row m-1 fw-bold">Nome do Cliente</div>
                        </div>
                        <div class="col-4">
                            <div class="text-end">
                                <div class="row ">Projeto</div>
                                <div class="row fw-bold">Nome do Projeto</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border rounded-3 mt-1">
                    <div class="col">
                        <div class="row m-1">Analista</div>
                        <div class="row m-1 fw-bold">Nome do Analista</div>
                    </div>
                </div>
                <div class="row border rounded-3 mt-1">
                    <div class="col">
                        <div class="row m-1">Data</div>
                        <div class="row m-1 fw-bold">00/00/0000</div>
                    </div>
                    <div class="col">
                        <div class="row m-1">Hora Inicio</div>
                        <div class="row m-1 fw-bold">00:00</div>
                    </div>
                    <div class="col">
                        <div class="row m-1">Hora Pausa</div>
                        <div class="row m-1 fw-bold">00:00</div>
                    </div>
                    <div class="col">
                        <div class="row m-1">Hora Saída</div>
                        <div class="row m-1 fw-bold">00:00</div>
                    </div>
                    
                </div>
                <div class="row border rounded-3 mt-1" style="height: 800px;">
                    <div class="col">
                        <div class="row m-1">Atividades</div>
                        <div class="row m-1 fw-bold">Nome do Analista</div>
                    </div>
                </div> --}}
{{-- 
            </page> --}}
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
    </body>
</html>