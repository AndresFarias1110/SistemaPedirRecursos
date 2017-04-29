@extends('layouts.scaffold')

@section('main')

<h1>Show Meta</h1>

<p>{{ link_to_route('metas.index', 'Return to All metas', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Clave</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $meta->clave }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('metas.destroy', $meta->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('metas.edit', 'Edit', array($meta->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
