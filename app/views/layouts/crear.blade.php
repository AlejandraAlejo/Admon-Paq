<!--
    SECCIONES DE LA PLANTILLA PARA CREAR
        Ejemplo de como implementar esta plantilla: app/views/supplier/create.blade.php

    @yield('titulo')
        Título de la´página, aparecera en la pestaña del navegador
    @yield('navegacion')
        Los elementos de la barra de navegación, es editable para especificar cual sección (Ingresos, Egresos, Proveedores, Usuarios) esta aciva
    @yield('tituloTabla')
        El título de la tabla, corresponde a la sección activa (Ingresos, Egresos, Proveedores, Usuarios)
    @yield('formulario')
        Contenido del formulario, desde Form::open hasta Form::close**Ver ejemplo
!-->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ 
                dateFormat: 'yy-mm-dd',
                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ]
            });
        });
  </script>
</head>
<body>

    <header id="header" class="header">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">AdmonPAQ</a>
            </div>
 
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    @yield('navegacion')
                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
 
                <ul class="nav navbar-nav navbar-right">
                    @yield('perfil')
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get('class')}}">
                {{Session::get('message')}}
            </div>
        @endif
        <div class = "panel panel-primary">
            <div class = "panel-heading list-buttons"><h4>@yield('tituloTabla')</h4></div>
            <div class = "supplier-form">
                @yield('formulario')
            </div>
        </div>
    </div>
</body>
</html>