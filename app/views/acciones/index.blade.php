@extends('layouts.scaffold')

@section('main')

<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Acciones <small>Admin</small></h1>
</div>

<p>{{ link_to_route('acciones.create', 'Agregar nueva Accion', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($acciones->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No_accion</th>
				<th>Descripcion</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($acciones as $accione)
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
			@endforeach
		</tbody>
	</table>
@else
	No hay metas
@endif

@stop
