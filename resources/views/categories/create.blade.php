@extends('layouts.app')

@section ('content')
	<div class="container">
		{!! Form::open(['route' => 'plans.store','enctype'=>'multipart/form-data','class'=>'form']) !!}
			
			@include('categories._form')

			<div class="form-group col-md-4">
				{!! Form::submit('Criar Categoria',['class'=>'btn btn-primary btn-block']) !!}
			</div>


				

		{!! Form::close() !!}
		
	</div>
@endsection

@section('post-script')


@endsection