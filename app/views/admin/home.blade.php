@extends('layouts.scaffold')

@section('main')

{{ HtmlHelper::message() }}

<div class="col-md-12 col-sm-12 clearfix" ng-controller="HomeCtrl">
	<div class="page-header">
		<h1><img src="/img/School-icon-72px.png"  class="img-circle">   Bienvenido <small>Admin</small></h1>
	</div>
	<div class="panel-body">
		<button type="button" class="btn btn-primary">Generar Reporte de las metas</button>
		<button type="button" class="btn btn-primary">Generar Reporte de las metas</button>
		
	</div>
	<div class="row">
		 <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
	        <li class="active"><a href="#meta" data-toggle="tab">Departamentos Metas</a></li>
	        <li class=""><a href="#accion" data-toggle="tab">Acciones Departamentos</a></li>
	        <li class=""><a href="#poa" data-toggle="tab">Generar POA</a></li>
	    </ul>
	    <div id="my-tab-content" class="tab-content">
	        <div class="tab-pane active" id="meta">
	            <div class="col-md-12 col-sm-12">
	            	{{ Form::open(['action' => ['HomeController@postAgregarHoja'], 'method' => 'post']) }}
					  <div class="col-md-12 col-sm-12">
					  	<input type="hidden" name="pestania" value="1" />	
					  </div>
					  
					  <div class="form-group col-md-12 col-sm-12">
					    	<div class="col-md-3 col-sm-3">
					    	
					    		<label class="control-label" for="txtHoja">Ejercicio</label>
					    		<select class="form-control" id="listEjercicios" name="ejercicio">
								  @foreach($ejercicios as $e)
								  <option value='{{ $e->id }}'>{{ $e->anio }}</option>
								  @endforeach
								</select>
					    	</div>
					    	<div class="col-md-3 col-sm-3">
					    		<label class="control-label" for="txtHoja">Meta</label>
					    		<select class="form-control" id="listMetas" name="meta">
					    			<option>[ Meta ]</option>
					    			@foreach($metas as $m)
					    		  	<option value="{{ $m->id }}">{{ $m->clave }}</option>
					    		  	@endforeach
					    		</select>
					    	</div>
					    	<div class="col-md-6 col-sm-6">
					    		<div class="col-md-12 col-sm-12" id="sltDescMetas">
					    			@include('partials.metas.sltHojas', ['disabled' => true])
					    		</div>
					    	</div>
					  </div>
					  <div style="padding-top:20px;" id="divDescM" class="col-md-12 col-sm-12 "  role="alert"></div>
					  <div class="col-md-12 col-sm-12">
					  	<hr>
					  	<h4>Departamentos para la meta seleccionada</h4>
					  		<h5>Departamentos existentes <small>Para seleccionar multiples departamentos presiona CRTL y da click al departamento que desee</small> </h5>
					  		
					  		<div class="col-md-6 col-sm-6">
					  			<select name="cat_departamentos_id[]" class="form-control" id="listDepartamentos" multiple="true" style="height: 300px; width:250px" onchange="seleccionarDeptos(this)">
						  			@foreach($departamentos as $depto)
						  				<option value="{{ $depto->id }}"> {{ $depto->departamento }} </option>
						  			@endforeach
						  		</select>
					  		</div>

					  		<div class="col-md-4 col-sm-4">
					  			<h5>Departamentos de la Meta</h5>
					  			<select id="listDepartamentosAgre" class="form-control" style="width:200px"></select>
					  		</div>
					  </div>
					  <div style="padding-top:10px;" class="col-md-12 col-sm-12">
					  <hr>
					  	<div class="col-md-2 col-sm-2 col-md-offset-10 col-sm-offset-10">
					  		<button class="btn btn-success">Asiganar datos seleccionados</button>
					  	</div>
					  </div>
					{{ Form::close() }}
	            </div>
	        </div>
	        <div class="tab-pane" id="accion">
	            <h4>Asiganar Acciones</h4>
	            {{ Form::open(['action' => ['HomeController@postAgregarAccion'], 'method' => 'post']) }}
	            	<input type="hidden" name="pestania" value="2" />
	            	<div class="col-md-12 col-sm-12">
		            	<div class="col-md-3 col-sm-3">
		            		<label>Meta</label>
					    	<select name="metaAccion" class="form-control" id="listMetas2">
					    		<option>[meta]</option>
					    		@foreach($metas as $m)
					    		 	<option value="{{ $m->id }}">{{ $m->clave }}</option>
					    		@endforeach
							</select>
		            	</div>
		            	<div class="col-md-3 col-sm-3">
					    	<div class="col-md-12 col-sm-12" id="sltDescMetas2">
					    		@include('partials.metas.sltHojas2', ['disabled' => true])
					    	</div>
		            	</div>
		            	<div class="col-md-6 col-sm-6">
							 <h5>Depatamentos de la Meta</h5>
							 <select multiple="true" style="height: 150px;"  name="depatamentos_acciones[]" id="listDepartamentosAgre2" class="form-control" style="width:200px"></select>
						</div>
		            </div>
		            <div style="padding-top:20px;" id="divDescM2" class="col-md-12 col-sm-12 "  role="alert"></div>
		            <div class="col-md-12 col-sm-12">
		            	<hr>
		            	<div class="col-md-3 col-sm-3">
		            		<label>Acciones</label>
					    	<select multiple="true" style="height: 300px;" class="form-control" id="listAcciones" name="accion[]">
					    		<option>[accion]</option>
					    		<?php $cont = 1; ?>
							    @foreach($acciones as $m)
					    		 	
					    		 	@if($m->no_accion == 1)
					    		 		<option value="{{ $m->id }}">{{ $m->no_accion }} <?php echo " ->Hoja " . $cont ?></option>
					    		 		<?php $cont ++; ?>	
					    		 	@else
					    		 		<option value="{{ $m->id }}">{{ $m->no_accion }}</option>
					    		 	@endif
					    		@endforeach
						    </select>
		            	</div>
		            	<div class="col-md-9 col-sm-9">
					  		<div class="panel panel-default">
							  <div class="panel-heading">Descripcion de la Accion</div>
							  <div class="panel-body">
							    <div style="padding-top:20px;" id="divDescAccion" class="col-md-12 col-sm-12 "  role="alert"></div>
							  </div>
							</div>
					  	</div>
		            </div>
		            <div style="padding-top:10px;" class="col-md-12 col-sm-12">
					  <hr>
					  <div class="col-md-2 col-sm-2 col-md-offset-10 col-sm-offset-10">
					  	<button class="btn btn-success">Asignar acciones seleccionados</button>
					  </div>
					</div>
	            {{ Form::close() }}
	        </div>
	        <div class="tab-pane" id="poa">
	            <h4>Generar POA</h4>
	            {{ Form::open(['action' => ['HomeController@postPoa'], 'method' => 'post']) }}
	            	<input type="hidden" name="pestania" value="3" />
	            	<div class="form-group col-md-12 col-sm-12">
					    
					    <div class="col-md-6 col-sm-6">
					    	{{-- $usuarios --}}
					    	<label class="control-label">Responsables</label>
					    	<select class="form-control" id="listUs" name="listUs">
					    		<option>[Usuario]</option>
					    		@foreach($usuarios as $us)
					    			<option value="{{ $us->id }}">{{ $us->nombre }}</option>
					    		@endforeach
					    	</select>
					    </div>
					    <div class="col-md-6 col-sm-6">
					    	<label class="control-label" for="txtHoja">Tus Departamentos</label>
					    		{{-- $departamentos --}}
					    		<select class="form-control" id="listDptos" name="listDptos">
								  <option>[Departamento]</option>
								</select>	
					    </div>
					  </div>
					  <div class="form-group col-md-12 col-sm-12">
					    	<div class="col-md-6 col-sm-6">
					    		<label class="control-label" for="txtHoja">Hoja</label>
					    		<select class="form-control" id="hoja" name="hoja">
					    			<option>[ Hoja ]</option>
					    		</select>
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
					    		<select style="height: 200px; width:100px" class="form-control" multiple="true" id="listPartida" name="listPartida[]">
					    			<option>[partidas]</option>
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
					    	<div class="col-md-9 col-sm-9">
					   			<label class="control-label">Justificacion</label>
					    		<textarea id="descripcion" name="descripcion" class="form-control" rows="4"></textarea>	
					    	</div>
					    	<div class="col-md-3 col-sm-3">
					    		<label class="control-label">Monto</label>
					    		<input type="text" name="monto" class="form-control" placeholder="$0000">
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
@stop

@section('scripts')
<script type="text/javascript">
	$('#listUs').change(function(e){
		console.log($(this).val());
		$.ajax({
			url:'http://localhost:8000/api/ProfesorDepartamentos/' + $(this).val(),
			type: 'GET',
			success: function(data){
				var options = "<option>[ Departamentos ]</option>";
				$.each(data, function(index, element){
					options += "<option value= " + element.id +">"+ element.departamento +"</option>";
				});
				$('#listDptos').html(options);
			},
			error:function(err){
				console.log(err);
			}
		});
	});
	$('#listDptos').change(function(e){
		//console.log(baseUrl +'/ProfesorDepartamentos/' + $(this).val());
		$.ajax({
			url: 'http://localhost:8000/prof/departamento/deptoMetas/' + $(this).val(),
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

	$('#hoja').change(function(e){
		$.ajax({
			url: 'http://localhost:8000/prof/departamento/hoja/meta/' + $(this).val(),
			type: 'GET',
			success: function(data){
				console.log(data);
				$('#listMeta').html('<option value='+ data.id +'>'+ data.clave +'</option>');
			},
			error: function(err){
				console.log(err);
			} 
		});

		$.ajax({
			url: 'http://localhost:8000/prof/departamento/hoja/' + $(this).val(),
			type: 'GET',
			success: function(data){
				$('#txtDescMeta').val(data.descripcion);
			},
			error: function(err){
				console.log(err);
			}
		});
		var maurl = 'http://localhost:8000/prof/departamento/hoja/acciones/' + $(this).val() + '/' + $('#listDptos').val(); 
		console.log('url ' + maurl);

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
			url: 'http://localhost:8000/prof/departamento/hoja/DescAccion/' + $(this).val(),
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
			url: 'http://localhost:8000/prof/departamento/partidaDesc/' + $(this).val(),
			type: 'GET',
			success: function(data){
				$('#txtDescPartida').val(data.descripcion);
			},
			error: function(err){
				console.log(err);
			}
		});
	});
</script>
<script type="text/javascript">
	var deptos;
	function seleccionarDeptos(e) {
		deptos = $(e).find("option:selected");
	}
	function agregarDeptos()
	{
		$.each(deptos, function(i, el){
			var val = $(el).val();
			var text = $(el).text();
			console.log(text + ":" + val);
		});
	}

	(function (){
		var baseUrl = $("body").attr('data-base-url');
		var _acciones = [];

		 console.log(baseUrl);
		 $("#listAcciones option").click(function(e) {
            var id = $(this).val();
            console.log(id);
            cargarDescAccion(id);
            var seleccionados = $("#listAcciones option:selected").toArray();
            /*for(var index in seleccionados) {
            	var element = seleccionados[index];
            	if(id == $(element).val()) {
            		//_acciones.push(element);
            		console.log(id);
            		cargarDescAccion(id);
            	}
            	else
            	{
            		var e = _acciones.pop();
            		cargarDescAccion($(e).val());
            		break;
            	}
            }
            
            $.each(, function(index, element){
            	if(id == $(element).val()) {
            		_acciones.push(element);
            		cargarDescAccion(id);
            	} else {
            		var e = _acciones.pop();
            		cargarDescAccion($(e).val());
            	}
            });
			*/
         });

         function cargarDescAccion(id) {
         	if(id > 0)
		            {
		               var url = baseUrl + '/api/accion/descripcion/' + id;
		               //$("#divDescM").html(loader);
		               $.ajax({
		                  url: url,
		               	  type: 'GET',
		                  success: function(data) {
		                    $("#divDescAccion").html(data.descripcion);
		                  }
		              }).fail(function(a, b, c) {
		                $("#divDescAccion").html("<div class=\"alert alert-warning\">Ocurrio un problema de carga.</div>");
		                console.log(a.responseText);
		              });
		            } else {
		             //$("#divDescM").html(listMetas);
		            }
         }
	})();
</script>
@stop