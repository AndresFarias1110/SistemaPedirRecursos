@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Responsable</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($responsable, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('responsables.update', $responsable->id))) }}

        <div class="form-group">
            {{ Form::label('profesion', 'Profesion:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('profesion', Input::old('profesion'), array('class'=>'form-control', 'placeholder'=>'Profesion')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('nombre', 'Nombre:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'Nombre')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('app', 'App:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('app', Input::old('app'), array('class'=>'form-control', 'placeholder'=>'App')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('apm', 'Apm:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('apm', Input::old('apm'), array('class'=>'form-control', 'placeholder'=>'Apm')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('responsables.show', 'Cancel', $responsable->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop