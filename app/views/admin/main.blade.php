<!doctype html>
<html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('css/main.css') }}

        {{ HTML::script('js/vendor/modernizr-2.8.3.min.js') }}

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/pie.css') }}
    </head>
    <body>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <div class="col-md-12" ng-controller="MainController">
      <div class="col-md-12" class="container">
        <nav class="navbar navbar-inverse">
					<ul class="nav nav-pills">
  				  <li>
              <a href="#">Inicioooo</a>
            </li>
  				  <li>
              <a href="#">Usuarios</a>
            </li>
  				  <li>
              <a href="#">Metas</a>
            </li>
  				  <li>
              <a href="#">Partidas</a>
            </li>
            <li>
              <a href="#">Departamentos</a>
            </li>
            <li>
              <a href="#">Perfil</a>
            </li>
            <li>
              <a href="{{ action('logout') }}">Salir</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
        


        <!-- Begin page content -->
    <div class="container">
        <div class="col-md-12 col-sm-12" ng-view></div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Derechos reservados. </p>
      </div>
    </footer>

    {{ HTML::script('js/vendor/jquery-1.11.2.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    <!--
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    -->
    </body>
</html>