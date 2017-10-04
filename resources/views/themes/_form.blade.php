			
			<div class="form-group col-xs-4">
				{!! Form::label('codigo','Código:') !!}
				{!! Form::text('codigo', null, ['class'=>'form-control']) !!}
			</div>
			<div class="form-group col-xs-8">
				{!! Form::label('description','Descrição:') !!}
				{!! Form::text('description', null, ['class'=>'form-control','id'=>'description','onChange'=>'mudarDescription();']) !!}
			</div>
			
			<div class="form-group">
				<div class="col-xs-9">
					{!! Form::label('category_id','Categoria:') !!}
					{!! Form::select('category_id',$categories, null, ['class'=>'form-control','id'=>'category_id','onChange'=>'mudarCategory();']) !!}
				</div>
				<div class="col-xs-3">
				<button type="button" style="margin-top:2em;" class="btn btn-primary btn-md" id="editarCategory" title="Editar Categorias" data-toggle="modal" data-target="#modalCategory">
					<i class="fa fa-cog"></i> Alterar Categorias
				</button>

			</div>
				
			</div>
			<div class="form-group">
			<div class="col-xs-9">
				
				{!! Form::label('provider_id','Provedor:') !!}
				{!! Form::select('provider_id',$providers, null, ['class'=>'form-control','id'=>'provider_id','onChange'=>'mudarProvider();']) !!}
			</div>
			<div class="col-xs-3">
					<button type="button" style="margin-top:2em;" class="btn btn-primary btn-md" id="alterarProvider" title="Editar Provider" data-toggle="modal" data-target="#modalProvider">
						<i class="fa fa-cog"></i> Alterar Provedores
					</button>
				</div>
			</div>
			<div class="form-group">
			<div class="col-xs-12">
				
				{!! Form::label('credito','Crédito:') !!}
				{!! Form::text('credito', null, ['class'=>'form-control moneyMask','id'=>'creditoInput']) !!}
			</div>
			</div>
			