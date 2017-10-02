@extends('layouts.simulate')

@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">
            <div class="col-md-12">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="msgError" class="row"></div>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30">
                                @if($categoria ==1)
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th> 
                                            <th>Crédito</th> 
                                            <th>1ª parcela <br> Pessoa Fisica</th>
                                            <th>Condição 1</th>
                                            <th>Condição 2</th>
                                            <th>Condição 3</th>
                                            <th>1ª parcela <br> Pessoa Juridica</th>
                                            <th>Condição 1</th>
                                            <th>Condição 2</th>
                                            <th>Condição 3</th>
                                        </tr>
                                    </thead> 
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th> 
                                            <th>Crédito</th> 
                                            <th>1ª parcela <br> Pessoa Fisica</th>
                                            <th>Condição 1</th>
                                            <th>Condição 2</th>
                                            <th>Condição 3</th>
                                            <th>1ª parcela <br> Pessoa Juridica</th>
                                            <th>Condição 1</th>
                                            <th>Condição 2</th>
                                            <th>Condição 3</th>
                                        </tr>
                                    </tfoot> 
                                    <tbody id="tableResults">
                                        @foreach($resultados as $consorcio)
                                        <tr>
                                            <td><small>{{$consorcio->codigo}}</small></td> 
                                            <td><small>{{$consorcio->descricao_do_bem}}</small></td> 
                                            <td><small>{{number_format($consorcio->credito,2,',','.')}}</small></td> 
                                            <td><small>{{number_format($consorcio->primeira_parcela_pf,2,',','.')}}</small></td> 
                                            <td><small>
                                            @if($consorcio->um_pf)
                                            {{$consorcio->um_pf->name}} de {{number_format($consorcio->um_pf->valor_parcela,2,',','.')}}
                                            @else
                                            X
                                            @endif
                                            </small></td> 
                                            <td><small>
                                            @if($consorcio->dois_pf)
                                            {{$consorcio->dois_pf->name}} de {{number_format($consorcio->dois_pf->valor_parcela,2,',','.')}}
                                            @else
                                            X
                                            @endif
                                            </small></td> 
                                            <td><small>
                                            @if($consorcio->tres_pf)
                                            {{$consorcio->tres_pf->name}} de {{number_format($consorcio->tres_pf->valor_parcela,2,',','.')}}
                                            @else
                                            X
                                            @endif
                                            </small></td> 

                                            <!-- pj-->
                                            <td><small>{{number_format($consorcio->primeira_parcela_pj,2,',','.')}}</small></td> 
                                            <td><small>
                                            @if($consorcio->um_pj)
                                            {{$consorcio->um_pj->name}} de {{number_format($consorcio->um_pj->valor_parcela,2,',','.')}}
                                            @else
                                            X
                                            @endif
                                            </small></td> 
                                            <td><small>
                                            @if($consorcio->dois_pj)
                                            {{$consorcio->dois_pj->name}} de {{number_format($consorcio->dois_pj->valor_parcela,2,',','.')}}
                                            @else
                                            X
                                            @endif
                                            </small></td> 
                                            <td><small>
                                            @if($consorcio->tres_pj)
                                            {{$consorcio->tres_pj->name}} de {{number_format($consorcio->tres_pj->valor_parcela,2,',','.')}}
                                            @else
                                            X
                                            @endif
                                            </small></td> 
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                
                                @else if($categoria ==2)
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th> 
                                            <th class="hidden">Provider *</th> 
                                            <th>Crédito</th> 
                                            <th>Codição Pessoa Fisica</th>
                                            <th>Codição Pessoa Juridica</th>
                                        </tr>
                                    </thead> 
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th> 
                                            <th class="hidden">Provider *</th> 
                                            <th>Crédito</th> 
                                            <th>Codição Pessoa Fisica</th>
                                            <th>Codição Pessoa Juridica</th>
                                        </tr>
                                    </tfoot> 
                                    <tbody id="tableResults">
                                        @foreach($resultados as $consorcio)
                                        <tr>
                                            <td><small>{{$consorcio->codigo}}</small></td> 
                                            <td><small>{{$consorcio->descricao_do_bem}}</small></td> 
                                            <td class="hidden"><small>{{$consorcio->provider->name}}</small></td> 
                                            <td><small>{{number_format($consorcio->credito,2,',','.')}}</small></td> 
                                            <td><small>{{$consorcio->um_pf->name}} de {{number_format($consorcio->um_pf->valor_parcela,2,',','.')}}</small></td> 
                                            <td><small>{{$consorcio->um_pj->name}} de {{number_format($consorcio->um_pj->valor_parcela,2,',','.')}}</small></td> 
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-3">      
                <form id="simulador" action="/buscar" method="get">
                    <div class="simulador-box">
                        <div class="contents">
                            <h3>Simulador Online</h3>
                            <div class="tipo row">
                                <div class="item col-xs-3 text-center" id="dvTipoImoveis" style="">
                                    <input name="categoria" id="tipoImoveis" value="1" checked type="radio">
                                    <label class="btn btn-primary"  onClick="escolhaCategory((this).id);" for="tipoImoveis" id="lblTipoImovel">
                                        <i class="fa fa-home"></i>
                                        IMÓVEIS
                                    </label>
                                </div>
                                <div class="item col-xs-3 text-center" id="dvTipoVeiculos" style="">
                                    <input name="categoria" id="tipoVeiculos" value="2" type="radio">
                                    <label class="btn btn-default"  onClick="escolhaCategory((this).id);" for="tipoVeiculos" id="lblTipoVeiculo">
                                        <i class="fa fa-car"></i>
                                        VEÍCULOS
                                    </label>
                                </div>
                                <div class="item col-xs-3 text-center" id="dvTipoServicos" style="">
                                    <input name="categoria" id="tipoServicos" value="3" type="radio">
                                    <label class="btn btn-default" onClick="escolhaCategory((this).id);"  for="tipoServicos" id="lblTipoServico">
                                        <i class="fa fa-wrench"></i>
                                        SERVIÇOS
                                    </label>
                                </div>
                                <div class="item col-xs-3 text-center" id="dvTipoEletro" style="">
                                    <input name="categoria" id="tipoEletro" value="4" type="radio">
                                    <label class="btn btn-default" onClick="escolhaCategory((this).id);"  for="tipoEletro" id="lblTipoEletro">
                                        <i class="fa fa-coffe"></i>
                                        ELETRO
                                    </label>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <br>
                            <div class="row">
                            <p>SIMULAR PLANO POR VALOR</p>
                                <div class="col-xs-6 text-center">
                                    <input id="credito" name="keyTipo" onFocus="$('#optionKey').html('DO CRÉDITO');"  value="credito" checked="checked" type="radio">
                                    <label class="btn btn-primary" id="lbl-credito" onclick="escolhaKey('credito');" for="credito">
                                        CRÉDITO
                                    </label>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <input id="parcela" name="keyTipo" onFocus="$('#optionKey').html(' DA PARCELA');" value="parcela" type="radio">
                                    <label class="btn btn-default" id="lbl-parcela" onclick="escolhaKey('parcela');"  for="parcela">
                                        PARCELA
                                    </label>
                                </div>
                                <div class="clear"></div>
                            </div>


                            <div class="row">
                                <p>ARRASTE E ESCOLHA O VALOR <span id="optionKey">DO CRÉDITO</span> <span id="loaderBusca"></span></p>
                                <div class="row" id="contentRanger" >
                                    <div>
                                        <input type="text" id="range" value="" name="range" />
                                    </div>
                                </div>
                       
                            </div>
                            <br>
                            
                            <div align="center">
                                <button class="btn btn-primary btn-block" >Simular Consórcio</button>
                            </div>


                        </div>
                    </div>
                </form>
    
            </div>


    </div>
</div>
@endsection
@section('post-script')

<!-- All JS -->
<script src="/node_modules/rangeSlider/js/jquery-1.12.3.min.js"></script>
<script src="/node_modules/rangeSlider/js/ion.rangeSlider.js"></script>

<script>

    $(function () {

        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 500000,
            @if($_GET['range'])
            <?php $temp = explode(';', $_GET['range']) ?>
            from: {{$temp[0]}},
            to: {{$temp[1]}},
            @else
            from: 0,
            to: 50000,
            @endif
            type: 'double',
            step: 1,
            prefix: "R$: ",
            grid: true
        });

    });

    function setRanger(min,max){
        $(function () {

        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: min,
            max: max,
            from: (min +200),
            to: (max -100),
            type: 'double',
            step: 1,
            prefix: "R$: ",
            grid: true
        });

    });
    }
</script>
<script type="text/javascript">
function escolhaCategory(tipo){
    switch (tipo) {
        case 'lblTipoImovel':

            $('#lblTipoImovel').removeClass('btn-default');
            $('#lblTipoImovel').addClass('btn-primary');

            $('#lblTipoVeiculo').removeClass('btn-primary');
            $('#lblTipoVeiculo').addClass('btn-default');

            $('#lblTipoServico').removeClass('btn-primary');
            $('#lblTipoServico').addClass('btn-default');

            $('#lblTipoEletro').removeClass('btn-primary');
            $('#lblTipoEletro').addClass('btn-default');

            // statements_1
            break;
        case 'lblTipoVeiculo':
            // statements_1
            $('#lblTipoVeiculo').removeClass('btn-default');
            $('#lblTipoVeiculo').addClass('btn-primary');

            $('#lblTipoImovel').removeClass('btn-primary');
            $('#lblTipoImovel').addClass('btn-default');

            $('#lblTipoServico').removeClass('btn-primary');
            $('#lblTipoServico').addClass('btn-default');

            $('#lblTipoEletro').removeClass('btn-primary');
            $('#lblTipoEletro').addClass('btn-default');
            break;
        case 'lblTipoServico':
            // statements_1
            $('#lblTipoServico').removeClass('btn-default');
            $('#lblTipoServico').addClass('btn-primary');

            $('#lblTipoImovel').removeClass('btn-primary');
            $('#lblTipoImovel').addClass('btn-default');

            $('#lblTipoVeiculo').removeClass('btn-primary');
            $('#lblTipoVeiculo').addClass('btn-default');

            $('#lblTipoEletro').removeClass('btn-primary');
            $('#lblTipoEletro').addClass('btn-default');
            break;
        case 'lblTipoEletro':
            // statements_1
            $('#lblTipoEletro').removeClass('btn-default');
            $('#lblTipoEletro').addClass('btn-primary');

            $('#lblTipoImovel').removeClass('btn-primary');
            $('#lblTipoImovel').addClass('btn-default');

            $('#lblTipoVeiculo').removeClass('btn-primary');
            $('#lblTipoVeiculo').addClass('btn-default');

            $('#lblTipoServico').removeClass('btn-primary');
            $('#lblTipoServico').addClass('btn-default');
            break;
        default:
            // statements_def
            break;
    }
             var TempInterva = setInterval(function() {             
            setvalor();
            clearTimeout(TempInterva);
            }, 50);
}

function setvalor(){

    cat = categoriaSelecionada = $("input[name='categoria']:checked").val();
    tipo = categoriaSelecionada = $("input[name='keyTipo']:checked").val();
     var request = $.ajax({
                    method:"GET",
                    url:"/valoresIndex?keyTipo="+tipo+"&cat="+cat,
                    dataType:"json"
                }); 

                request.done(function(e){
                   
                    if (e.status) {

                        $('#msgError').html('');
                        $('#loaderBusca').html('<i class="fa fa-check"></i>');
                        $('#contentRanger').html('');
                        $('#contentRanger').html('<div>                                        <input type="text" id="range" value="" name="range" />                                    </div>');

                        setRanger(e.rtn.min,e.rtn.max);
                                                
                   

                    }else{
                       /* $('#msgError').html('<p class="alert alert-danger text-danger">'+e.msg+'</p>');
                        $('#loaderBusca').css({backgroundColor: '#eee'});
                        $('#loaderBusca').html('<i class="fa fa-search"></i>');*/

                    }    

                });
                request.fail(function(e){
                        $('#loaderBusca').html('<i class="fa fa-close"></i>');
                    
                    console.log("Erro main js line75!");
                    console.log(e);
                    
                });
}
function escolhaKey(tipo){
    switch (tipo) {
        case 'credito':
            $('#loaderBusca').html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
            $('#loaderBusca').css({backgroundColor: 'honeydew'});
            $('#lbl-credito').removeClass('btn-default');
            $('#lbl-credito').addClass('btn-primary');

            $('#lbl-parcela').removeClass('btn-primary');
            $('#lbl-parcela').addClass('btn-default');
            // statements_1
        

        //requisição Ajax do banco
            break;
        case 'parcela':

            $('#lbl-credito').removeClass('btn-primary');
            $('#lbl-credito').addClass('btn-default');

            $('#lbl-parcela').removeClass('btn-default');
            $('#lbl-parcela').addClass('btn-primary');
            // statements_1
            break;
        default:
            // statements_def
            break;
    }
           var TempInterva = setInterval(function() {             
            setvalor();
            clearTimeout(TempInterva);
            }, 50);
}






@if($_GET['categoria'])
    switch ({{$_GET['categoria']}}) {
        case 1:
            $('#lblTipoImovel').click();
            break;
        case 2:
            $('#lblTipoVeiculo').click();
            break;
        case 3:
            $('#lblTipoServico').click();
            break;
        case 4:
            $('#lblTipoEletro').click();
            break;
        default:
            // statements_def
            break;
    }
@endif

@if($_GET['keyTipo'])
    switch ('{{$_GET['keyTipo']}}') {
        case 'credito':
            $('#lbl-credito').click();
            break;
        case 'parcela':
            $('#lbl-parcela').click();
            break;
        default:
            // statements_def
            break;
    }
@endif


</script>
@endsection