@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="page-header" style=" padding-bottom: 10px;">
        <h1><img src="/img/School-icon-72px.png"  class="img-circle">   Ejercicio <small>Editar</small></h1>
    </div>
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

{{ Form::model($ejercicio, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('ejercicios.update', $ejercicio->id))) }}

        <div class="form-group">
            {{ Form::label('anio', 'Año', array('class'=>'col-md-2 col-sm-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('anio', Input::old('anio'), array('class'=>'form-control', 'placeholder'=>'Año')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit(trans('labels.edit'), array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('ejercicios.show', 'Cancelar', $ejercicio->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop