@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="page-header" style=" padding-bottom: 10px;">
        <h1><img src="/img/School-icon-72px.png"  class="img-circle">   Acciones <small>Crear</small></h1>
    </div
    <div class="col-md-10 col-md-offset-2">

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'acciones.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label('no_accion', 'Numero de accion:', array('class'=>'col-md-6 col-sm-6 control-label')) }}
            <div class="col-sm-6 col-md-6">
              {{ Form::text('no_accion', Input::old('no_accion'), array('class'=>'form-control', 'placeholder'=>'No_accion')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', 'Descripcion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>'Descripcion')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit(trans('labels.create'), array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


