@extends('layouts.scaffold')

@section('main')

<div class="page-header" style=" padding-bottom: 10px;">
        <h1><img src="/img/School-icon-72px.png"  class="img-circle">   Ejercicio <small>modificado</small></h1>
</div>
<p>{{ link_to_route('ejercicios.index', 'Regresar a todos ls ejercicios', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Año</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $ejercicio->anio }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('ejercicios.destroy', $ejercicio->id))) }}
                            {{ Form::submit(trans('labels.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('ejercicios.edit', trans('labels.edit'), array($ejercicio->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
