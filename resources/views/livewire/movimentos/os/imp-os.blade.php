<div>
    <style>
       @media screen {
            #printSection {
                display: none;
            }
        }

        @media print {
            body * {
                visibility:hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
            }
            #printSection {
                position:absolute;
                left:0;
                top:0;
            }
        }

    </style>
    <div wire:ignore.self  class="modal fade " id="modalimpos" tabindex="-1" aria-labelledby="modalOsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content " > 
                <div class="container-fluid" id="printThis">
                    
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
                                Nome do cliente
                            </div>
                            <div class="col fw-bold">
                                Descricao do Projeto
                            </div>
                            <div class="col fw-bold">
                                XXXXXX
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
                                00/00/0000
                            </div>
                            <div class="col fw-bold">
                                00:00
                            </div>
                            <div class="col fw-bold">
                                00:00
                            </div>
                            <div class="col fw-bold">
                                00:00
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col form-text">
                                Analista
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col fw-bold">
                                Nome do Analista
                            </div>
                        </div>
                    </div> 
                    <div class="col form-text">
                        Descrição Atitidades
                    </div>
                    <div class="border h-60 ps-2">
                        <p class="text-break">
                            
                            
                        </p>
                    </div>
                    <br>
                    <hr>
                    <br>
                    
                </div>   
                <div class="row p-2">    
                    <button class="btn btn-primary" id="impos">
                        <i class="fas fa-print"></i>
                            Imprimir
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
