@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Crear Ejercicio</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'ejercicios.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <div class="col-sm-10 col-md-10">
                {{ Form::label('anio', 'Año:', array('class'=>'col-md-2 control-label')) }}
            </div>
            <div class="col-sm-10 col-md-10">
              {{ Form::text('anio', Input::old('anio'), array('class'=>'form-control', 'placeholder'=>'Año')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 col-md-2 control-label">&nbsp;</label>
    <div class="col-sm-10 col-md-10">
      {{ Form::submit(trans('labels.create'), array('class' => 'btn btn-lg btn-success')) }}
      {{ link_to_route('ejercicios.index', 'Regresar a todos ls ejercicios', null, array('class'=>'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


