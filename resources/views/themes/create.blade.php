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

	@include('themes._modalCategory')
	@include('themes._modalProvider')

@endsection

@section('post-script')

<script language="JavaScript" type="text/javascript">
	$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
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

	$(function(){
	    $('#alterCategory').submit(function(){
		   var form = $(this).serialize();
		        var request = $.ajax({
		            method:"POST",
		            url:"/categories/store",
		            data:form,
		            dataType:"json"
		        });

		        request.done(function(e){
		           
		            if (e.status) {

		            $('#tableResultsCat').append(''+rtnCatEdit(e.rtn));
		            $('#category_id').append(''+rtnCatOpt(e.rtn));
			    	$('#newCategory').val('');


		            }else{

			    	
		            }
		        });
		        request.fail(function(e){
		        	
		            console.log("Erro main js line75!");
		            console.log(e);
		        });
	    	 
	        
	        return false;
	    });

	});

	$(function(){
	    $('#createProviders').submit(function(){
		   var form = $(this).serialize();
		        var request = $.ajax({
		            method:"POST",
		            url:"/providers/storeMax",
		            data:form,
		            dataType:"json"
		        });

		        request.done(function(e){
		           
		            if (e.status) {
		           // $('#tableResultsCat').append(''+rtnCatEdit(e.rtn));
		            $('#provider_id').append(''+rtnProOpt(e.rtn));
			    	//$('#newCategory').val('');


		            }else{

			    	
		            }
		        });
		        request.fail(function(e){
		        	
		            console.log("Erro main js line75!");
		            console.log(e);
		        });
	    	 
	        
	        return false;
	    });

	});
	function rtnCatEdit(registro){
		msg = '<tr>';
                        msg+='      <td>'+registro.name+'</td>';


                        msg+='      <td>';
                        msg+='        <a href="#" id="btnEdit-'+registro.name+'" class="btn btn-primary btn-small btn-block" onclick="$(\'#btnEdit-'+registro.name+'\').fadeOut();$(\'#hide-'+registro.name+'\').fadeIn();">';
                        msg+='          Editar';

                        msg+='        </a>';
                        msg+='        <div class="row" style="display: none;" id="hide-'+registro.name+'">';
                        msg+='          <div class="col-md-8">';
                        msg+='          <input type="text" class="form-control" placeholder="Novo nome" id="new-'+registro.name+'"> ';
                        msg+='          <input type="hidden" class="form-control" id="old-'+registro.name+'"> ';
                        msg+='         </div>';
                        msg+='          <div class="col-md-4">';
                        msg+='            <button id="btnSave-'+registro.name+'" class="btn btn-block btn-success" onClick="saveCategory(\'cat-'+registro.name+'\');">Salvar</button>';
                        msg+='         </div>';

                        msg+='        </div>';
                        msg+='      </td>';
                        msg+='    </tr>';

                       return msg;
	}

	function saveCategory(cat){
		$input = 'new-'+cat;

		var request = $.ajax({
		            method:"GET",
		            url:"/categories/categoryAlter/"+cat+"/"+$('#'+$input).val(),
		            dataType:"json"
		        });

		request.done(function(e){
		           
		            if (e.status) {
		            	$('#category-'+cat).html(e.rtn.name);
		            	$msg = '';
		            	$.each(e.all, function(i,val){
		            		$msg+= '<option value="'+val.id+'">';
							$msg+='      <td>'+val.name+'</td>';
					        $msg+='</option>';

		            	});
		            $('#category_id').html(''+$msg);
		            $('#hide-'+cat).fadeOut();
		            $('#btnEdit-'+cat).fadeIn();
		           // $('#tableResultsCat').append(''+rtnCatEdit(e.rtn));
			    	//$('#newCategory').val('');


		            }else{

			    	
		            }
		        });
		        request.fail(function(e){
		        	
		            console.log("Erro main js line75!");
		            console.log(e);
		        });
	}
	function saveProvider(provider){
		$input = 'newProvider-'+provider;
		$input2 = 'newEmailProvider-'+provider;

		var request = $.ajax({
		            method:"GET",
		            url:"/providers/providerAlter/"+provider+"/"+$('#'+$input).val()+"/"+$('#'+$input2).val(),
		            dataType:"json"
		        });

		request.done(function(e){
		           
		            if (e.status) {
		            	$('#provider-'+provider).html(e.rtn.name);
		            	$msg = '';
		            	$.each(e.all, function(i,val){
		            		$msg+= '<option value="'+val.id+'">';
							$msg+='      <td>'+val.name+'</td>';
					        $msg+='</option>';

		            	});
		            $('#provider_id').html(''+$msg);
		            $('#hideProvider-'+provider).fadeOut();
		            $('#btnEditProvider-'+provider).fadeIn();
		           // $('#tableResultsCat').append(''+rtnCatEdit(e.rtn));
			    	//$('#newCategory').val('');


		            }else{

			    	
		            }
		        });
		        request.fail(function(e){
		        	
		            console.log("Erro main js line75!");
		            console.log(e);
		        });
	}

	function rtnCatOpt(registro){
		msg = '<option value="'+registro.id+'">';
		msg+='      <td>'+registro.name+'</td>';
        msg+='</option>';
		return msg;
	}
	function rtnProOpt(registro){
		msg = '<option value="'+registro.id+'">';
		msg+='      <td>'+registro.name+'</td>';
        msg+='</option>';
		return msg;
	}
</script>

@endsection