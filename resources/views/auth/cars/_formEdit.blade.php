			
			<div class="form-group col-xs-4">
				{!! Form::label('codigo','Código:') !!}
				{!! Form::text('codigo', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-xs-8">
				{!! Form::label('descricao_do_bem','Descrição:') !!}
				{!! Form::text('descricao_do_bem', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('category_id','Categoria:') !!}
				{!! Form::select('category_id',$categories, null, ['class'=>'form-control','id'=>'category_id']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('provider_id','Provedor:') !!}
				{!! Form::select('provider_id',$providers, null, ['class'=>'form-control','id'=>'provider_id']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('credito','Crédito:') !!}
				{!! Form::text('credito', number_format($car->credito,2,',','.'), ['class'=>'form-control moneyMask']) !!}
			</div>
			<hr>
			<div class="row">
				
				<h4>Valores Pessoa Fisica</h4>
				<div class="row">
					
					<div class="form-group col-md-6">

						{!! Form::label('primeira_parcela_pf','Primeira Parcela:') !!}
						{!! Form::text('primeira_parcela_pf', number_format($car->primeira_parcela_pf,2,',','.'), ['class'=>'form-control moneyMask']) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_um','Primeira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_um[\'name\']', isset($car->um_pf->name)?$car->um_pf->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
							
							{!! Form::text('condicao_um[\'valor_parcela\']', isset($car->um_pf->valor_parcela)?number_format($car->um_pf->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_dois','Segunda condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_dois[\'name\']', isset($car->dois_pf->name)?$car->dois_pf->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_dois[\'valor_parcela\']', isset($car->dois_pf->valor_parcela)?number_format($car->dois_pf->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_tres','Terceira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_tres[\'name\']', isset($car->tres_pf->name)?$car->tres_pf->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_tres[\'valor_parcela\']', isset($car->tres_pf->valor_parcela)?number_format($car->tres_pf->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>

			</div>

			<hr>
			<div class="row">
				
				<h4>Valores Pessoa Juridica</h4>
				<div class="row">
					
					<div class="form-group col-md-6">
						{!! Form::label('primeira_parcela_pj','Primeira Parcela:') !!}
						{!! Form::text('primeira_parcela_pj', number_format($car->primeira_parcela_pj,2,',','.'), ['class'=>'form-control moneyMask']) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_um_pj','Primeira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_um_pj[\'name\']', isset($car->um_pj->name)?$car->um_pj->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_um_pj[\'valor_parcela\']', isset($car->um_pj->valor_parcela)?number_format($car->um_pj->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_dois_pj','Segunda condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_dois_pj[\'name\']', isset($car->dois_pj->name)?$car->dois_pj->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_dois_pj[\'valor_parcela\']', isset($car->dois_pj->valor_parcela)?number_format($car->dois_pj->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_tres_pj','Terceira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_tres_pj[\'name\']', isset($car->tres_pj->name)?$car->tres_pj->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_tres_pj[\'valor_parcela\']', isset($car->tres_pj->valor_parcela)?number_format($car->tres_pj->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>

			</div>
	

