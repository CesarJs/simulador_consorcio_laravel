@extends('layouts.simulate')

@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">
            <div class="col-md-7">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div id="msgError" class="row"></div>
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table id="datable_1" class="table table-hover display  pb-30">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th> 
                                            <th>Provider *</th> 
                                            <th>Crédito</th> 
                                            <th>Codição Pessoa Fisica</th>
                                            <th>Codição Pessoa Juridica</th>
                                        </tr>
                                    </thead> 
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Descrição</th> 
                                            <th>Provider *</th> 
                                            <th>Crédito</th> 
                                            <th>Codição Pessoa Fisica</th>
                                            <th>Codição Pessoa Juridica</th>
                                        </tr>
                                    </tfoot> 
                                    <tbody id="tableResults">
                                        @foreach($resultados as $consorcio)
                                        <tr>
                                            <td>EC</td> 
                                            <td>60% HB20 COMFORT 1.0 FLEX 12V</td> 
                                            <td>Veiculos</td> 
                                            <td>Porto seguro</td> 
                                            <td>24.822,80</td> 
                                            <td></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">      
                <form id="simulador" action="/resultados" method="post">
                    <div class="simulador-box">
                        <div class="contents">
                            <h3>Simulador Online</h3>
                            <div class="tipo row">
                                <div class="item col-xs-3 text-center" id="dvTipoImoveis" style="">
                                    <input name="categoria" id="tipoImoveis" value="1" checked="checked" type="radio">
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
                                <p>ARRASTE E ESCOLHA O VALOR <span id="optionKey">DO CRÉDITO</span></p>
                                <div class="row" >
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
            from: 0,
            to: 50000,
            type: 'double',
            step: 1,
            prefix: "R$: ",
            grid: true
        });

    });
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
}
function escolhaKey(tipo){
    switch (tipo) {
        case 'credito':
            $('#lbl-credito').removeClass('btn-default');
            $('#lbl-credito').addClass('btn-primary');

            $('#lbl-parcela').removeClass('btn-primary');
            $('#lbl-parcela').addClass('btn-default');
            // statements_1
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
}

</script>
@endsection