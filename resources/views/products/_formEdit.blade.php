			
			<div class="form-group">
				{!! Form::label('plan_id','Plano:') !!}
				{!! Form::select('plan_id',$plans, null, ['class'=>'form-control','id'=>'plan_id','onChange'=>'mudarPlan();']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('theme_id','Bem:') !!}
				{!! Form::select('theme_id',$themes, null, ['class'=>'form-control','id'=>'theme_id','onChange'=>'setarCredito();']) !!}
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
						{!! Form::text('primeira_parcela_pf', number_format($product->primeira_parcela_pf,2,',','.'), ['class'=>'form-control moneyMask']) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_um','Primeira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_um[\'name\']', isset($product->um_pf->name)?$product->um_pf->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
							
							{!! Form::text('condicao_um[\'valor_parcela\']', isset($product->um_pf->valor_parcela)?number_format($product->um_pf->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_dois','Segunda condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_dois[\'name\']', isset($product->dois_pf->name)?$product->dois_pf->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_dois[\'valor_parcela\']', isset($product->dois_pf->valor_parcela)?number_format($product->dois_pf->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
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
						{!! Form::text('primeira_parcela_pj', number_format($product->primeira_parcela_pj,2,',','.'), ['class'=>'form-control moneyMask']) !!}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_um_pj','Primeira condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_um_pj[\'name\']', isset($product->um_pj->name)?$product->um_pj->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_um_pj[\'valor_parcela\']', isset($product->um_pj->valor_parcela)?number_format($product->um_pj->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<div class="form-group col-md-12">
							{!! Form::label('condicao_dois_pj','Segunda condição:') !!}
						</div>
						<div class="form-group col-md-6">
							{!! Form::text('condicao_dois_pj[\'name\']', isset($product->dois_pj->name)?$product->dois_pj->name:null, ['class'=>'form-control','placeholder'=>'Digite a descrição']) !!}
						</div>
						<div class="form-group col-md-6">
	
							{!! Form::text('condicao_dois_pj[\'valor_parcela\']', isset($product->dois_pj->valor_parcela)?number_format($product->dois_pj->valor_parcela,2,',','.'):null, ['class'=>'form-control moneyMask','placeholder'=>'Digite o valor da parcela']) !!}
						</div>

					</div>
					
				</div>
				

			</div>
	

