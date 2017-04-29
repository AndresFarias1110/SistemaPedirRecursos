<!doctype html>
<html lang="es">
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
    <body data-base-url="{{ url() }}">
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->

    @section('nav')
    <div class="col-md-12">
      <div class="col-md-12" class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav nav-pills">
                <li role="presentation"><a href="{{ action('home') }}">Inicio</a></li>
                <li role="presentation"><a href="{{ action('ejercicios.index') }}">Ejercicios</a></li>
                <li role="presentation"><a href="{{ action('metas.index') }}">Metas</a></li>
                <li role="presentation"><a href="{{ action('acciones.index') }}">Acciones</a></li>
                <li role="presentation"><a href="{{ action('partidas.index') }}">Partidas</a></li>
                <li role="presentation"><a href="{{ action('departamentos.index') }}">Departamentos</a></li>
                <li role="presentation"><a href="{{ action('responsables.index') }}">Responsables</a></li>
                <li role="presentation"><a href="{{ action('responsables.user') }}">Usuarios</a></li>
                <li role="presentation"><a href="{{ action('logout') }}">Salir</a></li>
            </ul>
        </nav>
      </div>
    </div>
    @show

        <!-- Begin page content -->
    <div class="container">
        <div class="col-md-12 col-sm-12">
            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            @yield('main')
        </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Derechos reservados.</p>
      </div>
    </footer>


        <!--
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        -->
        {{ HTML::style('js/jquery.min.js') }}}
        <script type="text/javascript" src="js/jquery.min.js"></script>
        
         {{ HTML::script('js/bootstrap.min.js') }}

        <script type="text/javascript">
            var id;
            var burl;
            (function(){
                var baseUrl = $("body").attr('data-base-url');
                burl = baseUrl;
                var loader = "<div class=\"text-center\">Cargando...</div><div class=\"progress\"><div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"45\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 100%\"><span class=\"sr-only\">45% Complete</span></div></div>";
                var listMetas = "<label>Descripciones de las metas</label>"
                                    + "<select class=\"form-control\" disabled>"
                                      + "<option>[ Descripción ]</option>"
                                    "</select>";

                //$('[data-toggle="popover"]').popover();

                function cargarDepartamentos(id, sltDescMetas, listDepartamentos){
                    $(sltDescMetas).find("select").change(function(e){
                       // console.log("Este es el change desde la pagina inicial");
                        //console.log(this);
                    });
                    //console.log(ls.get(0));

                    var url = burl + '/api/metas/departamentos/' + id;
                        //$("#sltDescMetas").html(loader);
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function(data) {
                                //console.log(data);
                                var h = "";
                                $.each(data, function(index, element){
                                    h += "<option value='"+element.id+"'>" +element.departamento + "</option>";
                                });
                                $(listDepartamentos).html(h);
                                //$("#sltDescMetas").html(data);

                            }
                        }).fail(function(a, b, c) {
                            //$("#sltDescMetas").html("<div class=\"alert alert-warning\">Ocurrio un problema de carga.</div>");
                            console.log(a.responseText);
                        });
                }

                var monitor = function(e, id, selector, url, fn) {
                    if(id > 0)
                    {
                        $(selector).html(loader);
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: fn
                        }).fail(function(a, b, c) {
                            $(selector).html("<div class=\"alert alert-warning\">Ocurrio un problema de carga.</div>");
                            console.log(a.responseText);
                        });
                    } else {
                        $(selector).html(listMetas);
                    }
                };

                $("#listMetas").change(function(e) {
                    var id = $(this).val();
                    var url = baseUrl + '/api/metas/' + id + '/hojas.html';
                    monitor(e, id, "#sltDescMetas", url, function(data) {
                        console.log(data);
                        $("#sltDescMetas").html(data);
                        //cargarDepartamentos(id, $("#sltDescMetas").html(data),"#listDepartamentosAgre");
                    });
                });


                $("#listMetas2").change(function(e) {
                    
                    var id = $(this).val();
                    var url = baseUrl + '/api/metas/' + id + '/hojas2.html';
                    monitor(e, id, "#sltDescMetas2", url, function(data, b, c, d) {
                        console.log(data);
                        $("#sltDescMetas2").html(data);
                        // cargarDepartamentos(id, $("#sltDescMetas2").html(data), "#listDepartamentosAgre2");
                    });
                    
                });

                function cargarDescripcionMetas(container, id) {
                    if(id > 0) {
                        var url = baseUrl + '/api/hoja/descripcion/' + id;
                        console.log("Url :" + url);
                        //$("#divDescM").html(loader);
                        $(container).html(loader);
                        $.ajax({
                            url: url,
                              type: 'GET',
                              success: function(data) {
                                var h = "";
                                /*$.each(data, function(index, element){
                                    h += element.descripcion + "<br />";
                                });*/

                                $(container).html('<h4>Descripcion ' + id + ':</h4> '+ data.descripcion);

                              }
                          }).fail(function(a, b, c) {
                            $(container).html("<div class=\"alert alert-warning\">Ocurrio un problema de carga.</div>");
                            console.log(a.responseText);
                          });
                        } else {
                         //$("#divDescM").html(listMetas);
                        }
                }

                function cargarDepartamentos(container, id) {
                    if (id > 0){
                        var url = baseUrl + '/api/hoja/departamentos/' + id;
                        var puntosEspera = 1;
                        var intervalos = setInterval(function() {
                            if(puntosEspera == 1) {
                                $(container).html("<option style='color: blue;'> Cargando Deptos </option>");
                            } else if(puntosEspera == 2) {
                                $(container).html("<option style='color: blue;'> Cargando Deptos . </option>");
                            } if(puntosEspera == 3) {
                                $(container).html("<option style='color: blue;'> Cargando Deptos ... </option>");
                            } else if(puntosEspera == 4) {
                                $(container).html("<option style='color: blue;'> Cargando Deptos .... </option>");
                                puntosEspera = 1;
                            }
                            puntosEspera++;
                        }, 500);
                        $.ajax({
                            url: url,
                            type: 'GET',
                            success: function(data) {
                                console.log("Inicio departamentos");
                                var h = "";
                                $.each(data, function(index, json){
                                    h += "<option value='" + json.id + "'>" + json.departamento + "</option>";
                                });
                                //var h = parceJsonToOptions(data);
                                //console.log(h);
                                console.log("Fin departamentos");
                                clearInterval(intervalos);
                                $(container).html(h);
                            }
                        });
                    }
                }

                $("#sltDescMetas").on('change', 'select#listDesMeta', function(e){
                    console.log("Change de lista 1");
                    var baseUrl = $("body").attr('data-base-url');
                    var id = $(this).val();
                    cargarDescripcionMetas("#divDescM", id);
                    cargarDepartamentos("#listDepartamentosAgre", id);
                });

                $("#sltDescMetas2").on('change', 'select#listDesMeta2', function(e){
                    var baseUrl = $("body").attr('data-base-url');
                     var id = $(this).val();
                     cargarDescripcionMetas("#divDescM2", id);
                     cargarDepartamentos("#listDepartamentosAgre2", id);
                });

            })();

            function metaListDepartamento(obj){
                //console.log(obj.value);
                var url = burl + "/api/departamento/" + obj.value;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(data){
                       // console.log(data);
                    }
                }).fail(function(a,b,c){
                    console.log(a.responseText);
                });
            }

            //listEjercicios
        </script>

        @yield('scripts')
    </body>
</html>