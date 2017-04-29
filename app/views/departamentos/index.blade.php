@extends('layouts.scaffold')

@section('main')

<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Departamentos <small>Admin</small></h1>
</div>
<p>{{ link_to_route('departamentos.create', 'Nuevo Departamento', null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if ($depto->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Departamento</th>
				<th>Responsables_id</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($depto as $departamento)
				<tr>
					<td>{{{ $departamento->departamento }}}</td>
					<td>{{{ $departamento->responsable->nombre }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('departamentos.destroy', $departamento->id))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{-- link_to_route('departamentos.edit', 'Editar', array($departamento->id), array('class' => 'btn btn-info')) --}}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no departamentos
@endif

@stop
