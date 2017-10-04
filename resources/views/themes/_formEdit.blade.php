			
			<div class="form-group col-xs-4">
				{!! Form::label('codigo','Código:') !!}
				{!! Form::text('codigo', null, ['class'=>'form-control','required'=>'true']) !!}
			</div>
			<div class="form-group col-xs-8">
				{!! Form::label('description','Descrição:') !!}
				{!! Form::text('description', null, ['class'=>'form-control','required'=>'true']) !!}
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
				{!! Form::text('credito', number_format($theme->credito,2,',','.'), ['class'=>'form-control moneyMask','required'=>'true']) !!}
			</div>
			