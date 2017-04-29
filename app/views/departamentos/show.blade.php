@extends('layouts.scaffold')

@section('main')

<h1>Show Departamento</h1>

<p>{{ link_to_route('departamentos.index', 'Return to All departamentos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Departamento</th>
				<th>Responsables_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $departamento->departamento }}}</td>
					<td>{{{ $departamento->responsables_id }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('departamentos.destroy', $departamento->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('departamentos.edit', 'Edit', array($departamento->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
