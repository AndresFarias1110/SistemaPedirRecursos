@extends('layouts.scaffold')

@section('main')

<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Responsables <small>Admin</small></h1>
</div>

<p>{{ link_to_route('responsables.create', 'Nuevo Responsable', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($responsables->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Profesion</th>
				<th>Nombre</th>
				<th>Primer Apellido</th>
				<th>Segundo Apellido</th>
				<th>Usuario</th>
				<th>Password Temporal</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($responsables as $responsable)
				<tr>
					<td>{{{ $responsable->profesion }}}</td>
					<td>{{{ $responsable->nombre }}}</td>
					<td>{{{ $responsable->app }}}</td>
					<td>{{{ $responsable->apm }}}</td>

					<td>
						@if(!is_null($responsable->usuario))
						{{ $responsable->usuario->nombre }}
						@endif
					</td>
					<td>
						@if(!is_null($responsable->usuario))
						{{ $responsable->usuario->pass_temp }}
						@endif
					</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('responsables.destroy', $responsable->id))) }}
                            {{ Form::submit(trans('labels.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('responsables.edit', trans('labels.edit'), array($responsable->id), array('class' => 'btn btn-info')) }}
                        
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay responsables !
@endif

@stop
