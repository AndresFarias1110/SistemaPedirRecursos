@extends('layouts.scaffold')

@section('main')

<h1> Accion modificado</h1>

<p>{{ link_to_route('acciones.index', 'Regresar a todas las acciones', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Accion</th>
			<th>Descripcion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $accione->no_accion }}}</td>
					<td>{{{ $accione->descripcion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('acciones.destroy', $accione->id))) }}
                            {{ Form::submit(trans('labels.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('acciones.edit', trans('labels.edit'), array($accione->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
