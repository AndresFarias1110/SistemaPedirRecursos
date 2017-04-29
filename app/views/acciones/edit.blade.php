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

{{ Form::model($accione, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('acciones.update', $accione->id))) }}

        <div class="form-group">
            {{ Form::label('no_accion', 'No. accion:', array('class'=>'col-md-2 col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('no_accion', Input::old('no_accion'), array('class'=>'form-control', 'placeholder'=>'No_accion')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion', 'Descripcion:', array('class'=>'col-md-2 col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion', Input::old('descripcion'), array('class'=>'form-control', 'placeholder'=>'Descripcion')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit(trans('labels.edit'), array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('acciones.show', 'Cancelar', $accione->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop