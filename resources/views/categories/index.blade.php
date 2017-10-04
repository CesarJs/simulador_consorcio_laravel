@extends('layouts.app')

@section ('content')

				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view" >
							<div class="panel-heading">
								<div class="pull-left">
									<a href="/plans/create" class="btn btn-success"><h6 class="panel-title txt-dark">Novo Plano</h6></a>
								</div>
								<div class="pull-right">
									<form action="" class="form">
											<div class="input-group">	
												<input type="text"  name="buscar" id="buscar" class="form-control" aria-label="..." placeholder="Buscar..." onkeyup="busca();">
												<span class="input-group-addon" id="loaderBusca">
													<i class="fa fa-search"></i>
												</span>
											</div><!-- /input-group -->
									</form>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
								<div class="row" id="msgError"></div>
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>ID</th>
														<th>Descrição</th>
														<th>Ação</th>
														
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>Descrição</th>
														<th>Ação</th>
														
													</tr>
												</tfoot>
												<tbody id='tableResults'>
													<?php foreach($plans as $consorcio){

				
														?>
														<tr>
																<td>{{$consorcio->id}}</td>
																<td>{{$consorcio->name}}</td>
																
																
																<td>
																	<a href="{{ route('plans.edit',['id'=>$consorcio->id]) }}" class="btn btn-primary btn-small">
																		Editar

																	</a>
																	<a href="{{ route('plans.destroy',['id'=>$consorcio->id]) }}" class="btn btn-warning btn-small hidden">
																			Deletar

																	</a>
																	
																</td>
															</tr>

														<?php }
														?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- /Row -->
			</div>
@endsection

@section('post-script')

<script type="text/javascript">
	function busca(){
		var key ='name';
		var buscar = $('#buscar').val();
		if(buscar =='' || key ==''){
			return false;
		}

		$('#loaderBusca').html('<i class="fa fa-spinner fa-spin fa-fw"></i>');
		$('#loaderBusca').css({backgroundColor: 'honeydew'});
		

		//requisição Ajax do banco
		var request = $.ajax({
		            method:"GET",
		            url:"/plans/buscarIndex/"+key+"/"+buscar,
		            dataType:"json"
		        }); 

		        request.done(function(e){
		           
		            if (e.status) {

		            	$('#msgError').html('');
		            	$('#loaderBusca').css({backgroundColor: '#eee'});
		            	$('#loaderBusca').html('<i class="fa fa-search"></i>');
		            	/*e.rtn.forEach( function(element, index) {
		            		// statements
		            		console.log(element);

		            	});*/
		            	$('#tableResults').html('');
		            	jQuery.each( e.rtn, function( i, val ) {
		            		console.log(val);
		            		msg = '<tr><td>'+val.id+'</td> <td>'+val.name+'</td>   <td><a href="/plans/'+val.id+'/edit" class="btn btn-primary btn-small">';
							msg+='											Editar</td></tr>';
							$('#tableResults').append(msg);
						});
								            	
		           

		            }else{
		            	$('#msgError').html('<p class="alert alert-danger text-danger">'+e.msg+'</p>');
		            	$('#loaderBusca').css({backgroundColor: '#eee'});
	        			$('#loaderBusca').html('<i class="fa fa-search"></i>');

		            }    

		        });
		        request.fail(function(e){
		            	$('#loaderBusca').css({backgroundColor: '#eee'});
		            	$('#loaderBusca').html('<i class="fa fa-search"></i>');
		        	
		            console.log("Erro main js line75!");
		            console.log(e);
		            
		        });


		//console.log(key);
		//console.log(buscar);
	}
</script>
@endsection