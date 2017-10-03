@extends('layouts.app')

@section ('content')

	<div class="container">
	
		<h3>Editando Bem: {{$theme->description}}</h3>



		{!! Form::model($theme, ['route'=>['themes.updateMax',$theme->id]]) !!}
			
			@include('themes._formEdit')

			<div class="form-group">

				{!! Form::submit('Salvar',['class'=>'btn btn-primary btn-block']) !!}
			</div>


				

		{!! Form::close() !!}
		
	</div>
@endsection

@section('post-script')

<script type="text/javascript">
	$(document).ready(function() {
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