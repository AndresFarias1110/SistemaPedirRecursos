@extends('layouts.scaffold')

@section('main')
<div class="page-header" style=" padding-bottom: 10px;">
    <h1><img src="/img/School-icon-72px.png"  class="img-circle">   Crear Departamentos <small>Admin</small></h1>
</div>
{{-- $resposables --}}
<div class="panel panel-default">
    <div class="panel panel-body">
        <div class="row">
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

        {{ Form::open(array('route' => 'departamentos.store', 'class' => 'form-horizontal')) }}

                <div class="form-group">
                    {{ Form::label('departamento', 'Departamento:', array('class'=>'col-md-4 col-sm-4 control-label')) }}
                    <div class="col-sm-8 col-md-8">
                      {{ Form::text('departamento', Input::old('departamento'), array('class'=>'form-control', 'placeholder'=>'Departamento')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('responsable', 'Responsable:', array('class'=>'col-md-4 col-sm-4 col-sm-4 control-label')) }}
                    <div class="col-sm-8 col-md-8">
                      <select id="listResp" name="listResp" class="form-control">
                          <option>[Responsables]</option>
                          @foreach($resposables as $resp)
                            <option value="{{ $resp->id }}">{{ $resp->nombre }}</option>
                          @endforeach
                      </select>
                      <hr>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" id="porf" name="prof" placeholder="Profesion" disabled="false"/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" id="app" name="app" placeholder="Paterno" disabled="false"/>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <input class="form-control" id="apm" name="apm" placeholder="Materno" disabled="false"/>
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

    </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript">
        $('#listResp').change(function(e){
            $.ajax({
                url: 'http://localhost:8000/api/responsable/' + $(this).val(),
                type: 'GET',
                success: function(data){
                    $('#porf').val(data.profesion);
                    $('#app').val(data.app);
                    $('#apm').val(data.apm);
                },
                error: function(err){
                    console.log(err);
                }
            });
        });
    </script>

</div>
@stop

