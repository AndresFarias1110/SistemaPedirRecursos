@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="page-header" style=" padding-bottom: 10px;">
        <h1><img src="/img/School-icon-72px.png"  class="img-circle">   Metas <small>Crear</small></h1>
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

{{ Form::open(array('route' => 'metas.store', 'class' => 'form-horizontal')) }}

     <div class="form-group">
        <div class="col-md-12 col-sm-12">
            <div class="col-md-6 col-sm-6">
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-4 col-sm-4">
                        <label>Ejercicio</label>    
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <select class="form-control" name="anio" id="anio">
                           @foreach($ejercicios as $e)
                                  <option value='{{ $e->id }}'>{{ $e->anio }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="col-md-12 col-sm-12">
                    {{ Form::label('clave', 'Clave:', array('class'=>'col-sm-4 col-md-4 control-label')) }}
                    <div class="col-sm-8 col-md-8">
                      {{ Form::text('clave', Input::old('clave'), array('class'=>'form-control', 'placeholder'=>'0.0.0')) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <hr/>
            <div class="col-md-6 col-sm-6">
                {{ Form::textarea('descripcion1', Input::old('descripcion1'), array('class'=>'form-control', 'placeholder'=>'Descripcion 1')) }}
            </div>
            <div class="col-md-6 col-sm-6">
                {{ Form::textarea('descripcion2', Input::old('descripcion2'), array('class'=>'form-control', 'placeholder'=>'Descripcion 2')) }}
            </div>
        </div>
            
      </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Crear', array('class' => 'btn btn-lg btn-primary')) }}
    </div>
</div>

{{ Form::close() }}

@stop


