@extends('layouts.scaffold')

@section('main')
<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Metas <small>Admin</small></h1>
</div>
<!--<h1>{{-- trans('labels.metas.list') --}}</h1>-->

<p>{{ link_to_route('metas.create', 'Nueva Meta', null, array('class' => 'btn btn-success')) }}</p>

@if ($metas->count())
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>
					{{ trans('labels.metas.table.clave') }}
				</th>
				<th>
					Descripciones
				</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($metas as $meta)
				<tr>
					<td>{{{ $meta->clave }}}</td>
					<td>
						@foreach($meta->hojas as $hoja)
							{{ $hoja->descripcion }} <br />____________________________________<br />
						@endforeach
					</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('metas.destroy', $meta->id))) }}
                            {{ Form::submit(trans('labels.metas.table.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('metas.edit', trans('labels.metas.table.edit'), array($meta->id), array('class' => 'btn btn-info')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $metas->links() }}
@else
	{{ trans('labels.metas.no_result') }}
@endif

@stop
