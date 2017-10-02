@extends('layouts.simulate')

@section ('content')

<div class="flex-center position-ref full-height">
    <div class="content">

        <form action="/buscar" method="GET" class="form">
            <div class="col-md-6 col-md-offset-3">
                <form id="frmSimulador" action="/planos.aspx" method="post">
                    <div class="simulador-box">
                        <div class="contents">
                            <h3>Simulador Online</h3>
                            <div class="tipo row">
                                <div class="item col-xs-3 text-center" id="dvTipoImoveis" style="">
                                    <input name="tipo" id="tipoImoveis" value="1" checked="checked" type="radio">
                                    <label class="btn btn-primary"  onClick="escolhaCategory((this).id);" for="tipoImoveis" id="lblTipoImovel">
                                        <i class="fa fa-home"></i>
                                        IMÓVEIS
                                    </label>
                                </div>
                                <div class="item col-xs-3 text-center" id="dvTipoVeiculos" style="">
                                    <input name="tipo" id="tipoVeiculos" value="2" type="radio">
                                    <label class="btn btn-default"  onClick="escolhaCategory((this).id);" for="tipoVeiculos" id="lblTipoVeiculo">
                                        <i class="fa fa-car"></i>
                                        VEÍCULOS
                                    </label>
                                </div>
                                <div class="item col-xs-3 text-center" id="dvTipoServicos" style="">
                                    <input name="tipo" id="tipoServicos" value="3" type="radio">
                                    <label class="btn btn-default" onClick="escolhaCategory((this).id);"  for="tipoServicos" id="lblTipoServico">
                                        <i class="fa fa-wrench"></i>
                                        SERVIÇOS
                                    </label>
                                </div>
                                <div class="item col-xs-3 text-center" id="dvTipoEletro" style="">
                                    <input name="tipo" id="tipoEletro" value="4" type="radio">
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
                                <div class="row">
                                    

                                </div>
                                <div id="slider" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                            </div>
                            <br>
                            <div id="row">
                                <div class="form uppercase">
                                    <div class="alert alert-danger" id="dvErro" style="display: none;">
                                        <div class="aviso">Mensagem</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Informe seu nome</label>
                                                <input class="form-control" id="txtNome" maxlength="64" name="inputNome" placeholder="Nome" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input class="form-control" name="inputEmail" maxlength="64" id="txtEmail" placeholder="Email" type="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>DDD + Telefone</label>
                                                <input class="form-control" name="inputTelefone" maxlength="14" id="txtTel" placeholder="Telefone" onkeypress="Mascara(this);" type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>CEP</label>
                                                <input class="form-control" name="inputCEP" maxlength="8" id="txtCep" placeholder="CEP" onkeypress="return SomenteNumber(event)" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input name="inputContato" id="chkReceberContato" checked="checked" type="checkbox">
                                            <label>Quero solicitar contato de um consultor</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div align="center">
                                <button class="btn btn-default" id="btnSimular">Simular Agora</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </form>

    </div>
</div>
@endsection
@section('post-script')

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