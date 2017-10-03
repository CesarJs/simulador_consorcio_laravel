@extends('layouts.app')

@section ('content')
	<div class="container">
	<div class="row" id="loader">		
		<span class="">caregando...</span>
		<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
	</div>
		{!! Form::open(['route' => 'themes.store','enctype'=>'multipart/form-data','class'=>'form']) !!}
			
			@include('themes._form')

			<div class="form-group">

				{!! Form::submit('Criar ',['class'=>'btn btn-primary btn-block']) !!}
			</div>


				

		{!! Form::close() !!}
		
	</div>
@endsection

@section('post-script')

<script language="JavaScript" type="text/javascript">
	
	function mudarCategory(){
		var cat = $('#category_id option:selected').text();
		window.localStorage.setItem("category",''+cat);
	}
	function mudarDescription(){
		var desc = $('#description').val();
		window.localStorage.setItem("description",''+desc);
	}

	function mudarProvider(){
		var cat = $('#provider_id option:selected').text();
		window.localStorage.setItem("provider",''+cat);
	}


	function setOptions(){
		console.log('Ultimas Configurações salvas');
		if(window.localStorage.getItem("category")){
		
			var categoria = window.localStorage.getItem("category");
			console.log(categoria);
			$("#category_id option:contains("+categoria+")").attr('selected', true);
		}

		if(window.localStorage.getItem("provider")){
		
			var provider = window.localStorage.getItem("provider");
			console.log(provider);
			$("#provider_id option:contains("+provider+")").attr('selected', true);
		}

		if(window.localStorage.getItem("description")){
		
			var dscri = window.localStorage.getItem("description");
			console.log(dscri);
			$("#description").val(''+dscri);
		}

		$('#loader').fadeOut();
	}
	$(document).ready(function() {
    	setOptions();
    	masker();
});

	function masker(){
		//VMasker(document.querySelector("#creditoInput")).maskPattern("(99) 9999-9999");
		VMasker($(".moneyMask")).maskMoney({
  // Decimal precision -> "90"
  precision: 2,
  // Decimal separator -> ",90"
  separator: ',',
  // Number delimiter -> "12.345.678"
  delimiter: '.',
  // Money unit -> "R$ 12.345.678,90"
  unit: '',
  // Money unit -> "12.345.678,90 R$"
  suffixUnit: '',
  // Force type only number instead decimal,
  // masking decimals with ",00"
  // Zero cents -> "R$ 1.234.567.890,00"
  zeroCents: false
});
	}
</script>

@endsection