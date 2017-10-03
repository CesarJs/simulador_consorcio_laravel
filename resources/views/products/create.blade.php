@extends('layouts.app')

@section ('content')
	<div class="container">
	<div class="row" id="loader">		
		<span class="">caregando...</span>
		<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
	</div>
		{!! Form::open(['route' => 'products.store','enctype'=>'multipart/form-data','class'=>'form']) !!}
			
			@include('products._form')

			<div class="form-group">

				{!! Form::submit('Criar Consórcio',['class'=>'btn btn-primary btn-block']) !!}
			</div>


				

		{!! Form::close() !!}
		
	</div>
@endsection

@section('post-script')

<script language="JavaScript" type="text/javascript">
	
	function setarCredito(){
		var product = $('#theme_id option:selected').val();

		 var request = $.ajax({
                    method:"GET",
                    url:"/credito?id="+product,
                    dataType:"json"
                }); 

                request.done(function(e){
                   
                    if (e.status) {                  
                       $("#creditoInput").val(e.rtn+'0');  
                       masker();                    
                   

                    }else{
                       

                    }    

                });
                request.fail(function(e){
                       
                    
                    console.log("Erro main js line54!");
                    console.log(e);
                    
                });
	}
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
	function mudarPlan(){
		var cat = $('#plan_id option:selected').text();
		window.localStorage.setItem("plan",''+cat);
	}


	function setOptions(){
		console.log('Ultimas Configurações salvas');
		if(window.localStorage.getItem("category")){
		
			var categoria = window.localStorage.getItem("category");
			console.log(categoria);
			$("#category_id option:contains("+categoria+")").attr('selected', true);
		}

		
		if(window.localStorage.getItem("plan")){
		
			var plan = window.localStorage.getItem("plan");
			console.log(plan);
			$("#plan_id option:contains("+plan+")").attr('selected', true);
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