@extends('layouts.scaffold')

@section('main')

<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Partidas <small>Admin</small></h1>
</div>

<p>{{ link_to_route('partidas.create', 'Nueva Partida', null, array('class' => 'btn btn-success')) }}</p>

@if ($partidas->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Descripcion</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($partidas as $partida)
				<tr>
					<td>{{{ $partida->descripcion }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('partidas.destroy', $partida->partida))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('partidas.edit', trans('labels.edit'), array($partida->partida), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $partidas->links() }}
@else
	{{ trans('labels.partidas.no_result') }}
@endif

@stop
