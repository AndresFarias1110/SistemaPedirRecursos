@extends('layouts.scaffold')

@section('main')

<h1>Show Partida</h1>

<p>{{ link_to_route('partidas.index', 'Return to All partidas', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Descripcion</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $partida->descripcion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('partidas.destroy', $partida->partida))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('partidas.edit', 'Edit', array($partida->partida), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
