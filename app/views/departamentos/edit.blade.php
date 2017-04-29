@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Departamento</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($departamento, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('departamentos.update', $departamento->id))) }}

        <div class="form-group">
            {{ Form::label('departamento', 'Departamento:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('departamento', Input::old('departamento'), array('class'=>'form-control', 'placeholder'=>'Departamento')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('responsables_id', 'Responsables_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('responsables_id', Input::old('responsables_id'), array('class'=>'form-control', 'placeholder'=>'Responsables_id')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('departamentos.show', 'Cancel', $departamento->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop