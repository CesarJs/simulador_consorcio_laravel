			
			<div class="form-group col-xs-4">
				{!! Form::label('codigo','Código:') !!}
				{!! Form::text('codigo', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-xs-8">
				{!! Form::label('descricao_do_bem','Descrição:') !!}
				{!! Form::text('descricao_do_bem', null, ['class'=>'form-control','id'=>'description','onChange'=>'mudarDescription();']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('category_id','Categoria:') !!}
				{!! Form::select('category_id',$categories, null, ['class'=>'form-control','id'=>'category_id','onChange'=>'mudarCategory();']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('provider_id','Provedor:') !!}
				{!! Form::select('provider_id',$providers, null, ['class'=>'form-control','id'=>'provider_id','onChange'=>'mudarProvider();']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('credito','Crédito:') !!}
				{!! Form::text('credito', null, ['class'=>'form-control moneyMask','id'=>'creditoInput']) !!}
			</div>
			<hr>
			<div class="row">
				
				<h4>Valores Pessoa Fisica</h4>
				<div class="row">
					
					<div class="form-group col-md-6">
						{!! Form::label('primeira_parcela_pf','Primeira Parcela:') !!}
						{!! Form::text('primeira_parcela_pf', null, ['class'=>'form-control moneyMask']) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_um','Primeira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_um[\'name\']', null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_um[\'valor_parcela\']', null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_dois','Segunda condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_dois[\'name\']', null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_dois[\'valor_parcela\']', null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_tres','Terceira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_tres[\'name\']', null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_tres[\'valor_parcela\']', null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
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
						{!! Form::text('primeira_parcela_pj', null, ['class'=>'form-control moneyMask']) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_um_pj','Primeira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_um_pj[\'name\']', null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_um_pj[\'valor_parcela\']', null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_dois_pj','Segunda condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_dois_pj[\'name\']', null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_dois_pj[\'valor_parcela\']', null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_tres_pj','Terceira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_tres_pj[\'name\']', null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_tres_pj[\'valor_parcela\']', null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>

			</div>
	

