<!DOCTYPE html>
<html>
<head>
	<title>Profesores</title>
	 <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

     <link rel="apple-touch-icon" href="apple-touch-icon.png">
     {{ HTML::style('css/bootstrap.min.css') }}
     {{ HTML::style('css/pie.css') }}
</head>
<body data-base-url="{{ url() }}">
	
	<div class="col-md-12">
      <div class="col-md-12" class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="{{ action('home') }}">Inicio</a></li>
                <li role="presentation"><a href="{{ action('perfil') }}">Mi Perfil</a></li>
                <li role="presentation"><a href="{{ action('logout') }}">Salir</a></li>
            </ul>
        </nav>

      </div>
      <div class="page-header">
      	<h1>Bienvenido <small>{{ Auth::user()->responsable->nombre }}</small></h1>
      </div>
    </div>
    <div class="container">
	   <div class="panel panel-default">
		  <div class="panel-heading">Requisición</div>
		  <div class="panel-body">
		  	<div class="col-md-12 col-sm-12" style="margin-top:10px;">
		  		{{ HtmlHelper::message() }}
		  		<div class="col-md-6 col-sm-6" align="center">
		  			<a id="lnkVerRequisicion" data-href="{{ action('requisicion') }}" class="btn btn-primary" href="#">
				  		Ver Requisicion
				  	</a>	
		  		</div>
		  		<div class="col-md-6 col-sm-6">
		  			<a id="eliminarRequisicion" data-href="{{ action('eliminarRequisicion') }}" class="btn btn-warning" href="{{ action('eliminarRequisicion') }}">
				  		Eliminar Requisiciones
				  	</a>
		  		</div>
		  	</div>

		  	<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" >
		        <li class="active"><a href="#meta" data-toggle="tab">General</a></li>
		    </ul>
		    <div id="my-tab-content" class="tab-content" style="margin-top:10px;">
	        <div class="tab-pane active" id="meta">
	            <div class="col-md-12 col-sm-12">
	            	{{ Form::open(['action' => ['ProfesoresController@postGeneral'], 'method' => 'post']) }}
	            	<div class="form-group col-md-12 col-sm-12" style="padding: 20px;">
	            		<div class="col-md-6 col-sm-6">
	            			<center>
						    	<label class="control-label" for="txtHoja">Tus Departamentos</label>
						    		<select class="form-control" id="listDptos" name="listDptos">
									  <option>[Departamento]</option>
									  @foreach($dptos as $dpto)
									  	<option value='{{ $dpto->id }}'>{{ $dpto->departamento }}</option>
									   @endforeach
									</select>
						    </center>
	            		</div>
	            		<div class="col-md-6 col-sm-6">
					    		<label class="control-label" for="txtHoja">Hoja</label>
					    		<select class="form-control" id="hoja" name="hoja">
					    			<option>[ Hoja ]</option>
					    		</select>
					    </div>
					  </div>
					  <div class="form-group col-md-12 col-sm-12">
					    	<div class="col-md-6 col-sm-6">
		            			<center>
							    	<label class="control-label" for="txtHoja" >Clave Presupuestal</label>
							    	<div id="divCP">
							    		<input id="clavep" class="form-control" name="clavep"/>	
							    	</div>
							    	
							    </center>
	            			</div>
					    	<div class="col-md-6 col-sm-6">
					    		<label class="control-label" for="txtHoja">Meta</label>
					    		<select class="form-control" id="listMeta" name="listMeta">
								  
								</select>
					    	</div>
					  </div>
					  <div class="col-md-12 col-sm-12">
					  	<label class="control-label">Descripcion</label>
					  	<textarea id="txtDescMeta" class="form-control" rows="5" disabled="false"></textarea>
					  </div>
					  <div class="col-md-12 col-sm-12" style="padding-top:20px;">
					    	<div class="col-md-3 col-sm-3">
					    		<label class="control-label">Accion</label>
					    		<select class="form-control" id="listAccion" name="listAccion">
								  
								</select>
					    	</div>
					   		<div class="col-md-9 col-sm-9">
					   			<label class="control-label">Descripcion</label>
					    		<textarea id="txtDescAccion" class="form-control" rows="5" disabled="false"></textarea>	
					    	</div>
					   </div>
					   <div class="col-md-12 col-sm-12" style="padding-top:20px;">
					    	<div class="col-md-3 col-sm-3">
					    		<label class="control-label">Partida</label>
					    		<select class="form-control" id="listPartida" name="listPartida">
								  @foreach($partidas as $patida)
								  	<option value='{{ $patida->partida }}'>{{ $patida->partida }}</option>
								  @endforeach
								</select>
					    	</div>
					   		<div class="col-md-9 col-sm-9">
					   			<label class="control-label">Descripcion</label>
					    		<textarea id="txtDescPartida" class="form-control" rows="5" disabled="false"></textarea>	
					    	</div>
					   </div>
					   <div class="col-md-12 col-sm-12" style="padding-top:20px;">
					    	<div class="col-md-6 col-sm-6">
					   			<label class="control-label">Cantidad</label>
					    		<input class="form-control" name="cantidad" required />	
					    	</div>
					    	<div class="col-md-6 col-sm-6">
					    		<label class="control-label">Unidad</label>
					    		<input type="text" name="unidad" class="form-control" required>
					    	</div>
					   </div>
					   <div class="col-md-12 col-sm-12" style="padding-top:20px;">
					    	<div class="col-md-9 col-sm-9">
					   			<label class="control-label">Descripcion</label>
					    		<textarea id="txtJustificacion" name="txtJustificacion" class="form-control" rows="4" required></textarea>	
					    	</div>
					    	<div class="col-md-3 col-sm-3">
					    		<label class="control-label">Costo estimado</label>
					    		<input type="text" name="monto" class="form-control" placeholder="$0000" required>
					    		<label class="control-label">Fecha</label>
					    		<input class="form-control" data-provide="datepicker"  name="fechaS">
					    	</div>

					   </div>
					   <div class="col-md-12 col-sm-12" style="padding-top:20px;">
					   <center>
					   		<button class="btn btn-success">Agregar</button>
					   </center>

					   </div>
					{{ Form::close() }}
	            </div>
	        </div>
	       
	    </div>
		  </div>
		</div>
	</div>

    <!--Pie de la pagina-->
    <footer class="footer">
	  <div class="container">
	    <p class="text-muted">Derechos reservados.</p>
	   </div>
	</footer>

{{-- Auth::user()->responsable->id --}} <br/>
{{-- Auth::user()->responsable->departamentos --}}

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="/datepicker-master/js/bootstrap-datepicker.js"></script>

<script type="text/javascript">

	$('.datepicker').datepicker({
	    format: 'yyyy/mm/dd'
	    //startDate: '-3d'
	});

	var descMeta = '';
	var dpto = '';
	var baseUrl = $("body").attr('data-base-url');
	//console.log('Base url=' + baseUrl);
	$('#listDptos').change(function(e){
		dpto = $(this).val();
		//console.log(baseUrl +'/ProfesorDepartamentos/' + $(this).val());
		$.ajax({
			url: baseUrl + '/prof/departamento/deptoMetas/' + $(this).val(),
			type: 'GET',
			success: function(data){
				console.log(data);
				var options = "<option>[ Hoja ]</option>";
				$.each(data, function(index, element){
					options += "<option value= " + element.id +">"+ element.id +"</option>";
				});
				$('#hoja').html(options);
			},
			error: function(err){
				console.log(err);
			}
		});
	});

	var metaid=0;
	
	$('#hoja').change(function(e){
		$.ajax({
			url: baseUrl + '/prof/departamento/hoja/meta/' + $(this).val(),
			type: 'GET',
			success: function(data){
				console.log(data);
				metaid = data.id;
				$('#listMeta').html('<option>[meta]</option><option value='+ data.id +'>'+ data.clave +'</option>');
				$('#clavep').val(data.clave_presupuestal);
			},
			error: function(err){
				console.log(err);
			} 
		});

		$.ajax({
			url: baseUrl + '/prof/departamento/hoja/' + $(this).val(),
			type: 'GET',
			success: function(data){
				descMeta = data.descripcion;
				$('#txtDescMeta').val(data.descripcion);
			},
			error: function(err){
				console.log(err);
			}
		});

		var maurl = baseUrl + '/prof/departamento/hoja/acciones/' + $(this).val() + '/' + $('#listDptos').val();
		
		$.ajax({
			url: maurl,
			type: 'GET',
			success: function(data){
				var acciones='<option>[acciones]</option>';
				$.each(data, function(index, element){
					acciones += '<option value='+ element.id +'>'+ element.no_accion + '</option>';
				});

				$('#listAccion').html(acciones);
			},
			error: function(err){
				console.log(err);
			}
		});
		
	});

	$('#listAccion').change(function(e){
		$.ajax({
			url: baseUrl + '/prof/departamento/hoja/DescAccion/' + $(this).val(),
			type: 'GET',
			success: function(data){
				$('#txtDescAccion').val(data.descripcion);
			},
			error: function(err){
				console.log(err);
			}
		});

	});



	$('#listPartida').change(function(e){
		$.ajax({
			url: baseUrl + '/prof/departamento/partidaDesc/' + $(this).val(),
			type: 'GET',
			success: function(data){
				$('#txtDescPartida').val(data.descripcion);
			},
			error: function(err){
				console.log(err);
			}
		});
	});

	$('#listMeta').change(function(e){
		console.log('change meta');
		var urlP = '/prof/departamento/hoja/partidas/' + $('#listDptos').val() + '/' + $('#hoja').val() + '/' + $(this).val();
		var urlVerReq = $('#lnkVerRequisicion').attr('data-href');
		urlVerReq += '?idDepto=' + $('#listDptos').val() + '&idMeta=' + $(this).val() + '&clavep=' + $('#clavep').val() + '&descMeta=' + descMeta + '&idDpto=' + dpto;
		$('#lnkVerRequisicion').attr('href', urlVerReq);

		$.ajax({
			url: urlP,
			type: 'GET',
			success: function(data){
				var options = '<option>[Partidas]</option>';
				$.each(data, function(index, element){
					options += '<option value='+ element.partida_id +'>' + element.partida_id + '</option>';
				});

				$('#listPartida').html(options);
			},
			error: function(err){
				console.log(err);
			}
		});
	});
</script>
</body>
</html>