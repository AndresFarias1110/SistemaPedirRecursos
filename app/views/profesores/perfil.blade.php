<!DOCTYPE html>
<html>
<head>
	<title>Perfil</title>
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
      	<h1>Datos de Usuario <small>{{ Auth::user()->responsable->nombre }}</small></h1>
      </div>
    </div>
    <div class="container">
	   <div class="panel panel-default">
		  <div class="panel-heading">Requisición</div>
		  <div class="panel-body">


		  	<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
		        <li class="active"><a href="#meta" data-toggle="tab">General</a></li>
		    </ul>
		    <div id="my-tab-content" class="tab-content">
	        <div class="tab-pane active" id="meta">
	            <div class="col-md-12 col-sm-12">
	            	{{ Form::open(['action' => ['ProfesoresController@postUsuario'], 'method' => 'post']) }}
	            		{{ HtmlHelper::message() }}
	            		<div class="col-md-12 col-sm-12" style="margin-top:30px;">
	            			<div class="col-md-6 col-sm-6">
	            				<label>Usuario</label>
	            				<input type="text" class="form-control" name="usuario" value="{{ $usuario->nombre }}" />
	            			</div>
	            			<div class="col-md-6 col-sm-6">
	            				<label>Password</label>
	            				<input type="text" class="form-control" name="password" value="{{ $usuario->pass_temp }}"/>
	            			</div>
	            		</div>
	            		<div class="col-md-12 col-sm-12" style="margin-top:30px;">
	            			<div class="col-md-6 col-sm-6">
	            				<label >Nombre</label>
	            				<input type="text" class="form-control" name="nombre" value="{{ $responsable->nombre }}" />
	            			</div>
	            			<div class="col-md-6 col-sm-6">
	            				<label >Primer Apellido</label>
	            				<input type="text" class="form-control" name="app" value="{{ $responsable->app }}"/>
	            			</div>
	            		</div>
	            		<div class="col-md-12 col-sm-12" style="margin-top:30px;">
	            			<div class="col-md-6 col-sm-6">
	            				<label >Segundo Apellido</label>
	            				<input type="text" class="form-control" name="apm" value="{{ $responsable->apm }}"/>
	            			</div>
	            			<div class="col-md-6 col-sm-6">
	            				<label >Profesion</label>
	            				<input type="text" class="form-control" name="profesion" value="{{ $responsable->profesion }}"/>
	            			</div>
	            		</div>
	            		<div class="col-md-12" style="margin-top:30px;">
	            			<button class="btn btn-success">Modificar</button>
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
<script type="text/javascript">
	
</script>
</body>
</html>