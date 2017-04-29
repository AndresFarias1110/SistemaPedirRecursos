@extends('layouts.scaffold')

@section('main')

<div class="page-header" style=" padding-bottom: 10px;">
	<h1><img src="/img/School-icon-72px.png"  class="img-circle">  Usuarios <small>Admin</small></h1>
</div>

<div class="panel panel-default">
	<div class="panel panel-body">
		{{-- $responsables --}}
		
		{{ Form::open(['action' => ['UsuariosController@postAgregarUsuario'], 'method' => 'post']) }}
			<div class="col-md-12 col-sm-12">
				
				<div class="col-md-12 col-sm-12">
					<div class="col-md-4 col-sm-4">
						<label>Responsable</label>
					</div>
					<div class="col-md-8 col-sm-8">
						<select class="form-control" name="resp" id="resp">
							<option>[Responsables]</option>
							@foreach($responsables as $resp)
								<option value="{{ $resp->id }}"> {{ $resp->nombre }} </option>
							@endforeach
						</select>
					</div>		
				</div>
				<div class="col-md-12 col-sm-12" style="padding-top:10px;">
					<div class="col-md-4 col-sm-4">
						<label>Usuario</label>
					</div>
					<div class="col-md-8 col-sm-8">
						<input type="text" class="form-control" id="usuario" name="usuario"></input>
					</div>		
				</div>
				<div class="col-md-12 col-sm-12" style="padding-top:10px;">
					<div class="col-md-4 col-sm-4">
						<label>password</label>
					</div>
					<div class="col-md-8 col-sm-8">
						<input type="text" class="form-control" id="pass_t" name="pass_t"></input>
					</div>		
				</div>
				<div class="col-md-12 col-sm-12" style="padding-top:10px;">
					<button class="btn btn-success">Guardar</button>		
				</div>
			</div>
		{{ Form::close() }}
	</div>
</div>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
	$('#resp').change(function(e){
		$.ajax({
			url: 'http://localhost:8000/api/respUsuario/' + $(this).val(),
			type:'GET',
			success: function(data){
				if(data.nombre != null){
					$('#usuario').val(data.nombre);
					$('#pass_t').val(data.pass_temp);	
				}
			},
			error: function(err){
				console.log(err);
			}
		});
	});
</script>
@stop