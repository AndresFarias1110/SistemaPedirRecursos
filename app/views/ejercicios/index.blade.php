@extends('layouts.scaffold')

@section('main')
<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Acciones <small>Admin</small></h1>
</div>

<p>{{ link_to_route('ejercicios.create', 'Nuevo Ejercicio', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($ejercicios->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Año</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ejercicios as $ejercicio)
				<tr>
					<td>{{{ $ejercicio->anio }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('ejercicios.destroy', $ejercicio->id))) }}
                            {{ Form::submit(trans('labels.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('ejercicios.edit', trans('labels.edit'), array($ejercicio->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no ejercicios
@endif

@stop
