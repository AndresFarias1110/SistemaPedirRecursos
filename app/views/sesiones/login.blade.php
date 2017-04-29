@extends('masterpage.master')

@section('nav')
@stop


@section('main')
<div class="col-md-12 clearfix">
	<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4" style="margin-top: 20px;">
		{{ Form::open(['route' => ['login'], 'method' => 'post']) }}
		<label class="control-label">Usuario</label>
		{{ Form::text('nombre', Input::old('usuario'), ['class' => 'form-control', 'placeholder' => 'usuario', 'required' => true]) }}

		<label class="control-label">Password</label>
		{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) }}

		{{ Form::submit('Entrar', ['class' => 'btn btn-primary btn-block']) }}
		{{ Form::close() }}
	</div>
</div>
@stop