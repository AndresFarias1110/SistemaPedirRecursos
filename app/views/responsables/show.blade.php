@extends('layouts.scaffold')

@section('main')

<h1>Show Responsable</h1>

<p>{{ link_to_route('responsables.index', 'Return to All responsables', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Profesion</th>
				<th>Nombre</th>
				<th>App</th>
				<th>Apm</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $responsable->profesion }}}</td>
					<td>{{{ $responsable->nombre }}}</td>
					<td>{{{ $responsable->app }}}</td>
					<td>{{{ $responsable->apm }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('responsables.destroy', $responsable->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('responsables.edit', 'Edit', array($responsable->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
