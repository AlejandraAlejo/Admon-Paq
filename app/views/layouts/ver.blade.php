<!--
    SECCIONES DE LA PLANTILLA PARA LLENAR
        Ejemplo de como implementar esta plantilla: app/views/user/show.blade.php

    @yield('titulo')
        Título de la´página, aparecera en la pestaña del navegador
    @yield('navegacion')
        Los elementos de la barra de navegación, es editable para especificar cual sección (Ingresos, Egresos, Proveedores, Usuarios) esta aciva
    @yield('tituloTabla')
        El título de la tabla, corresponde a la sección activa (Ingresos, Egresos, Proveedores, Usuarios)
    @yield('botonCrear')
        Botón crear que llevara al usuario al formulario para registrar un nuevo Ingreso/Egreso/Proveedor/Usuario
    @yield('nombreColumnas')
        Nombre de las columnas de la BD que se mostrarán en la tabla
    @yield('contenidoTabla')
        Contenido de la tabla encerrado en un FOREACH que estará en un IF. **Ver ejemplo
    @yield('paginacion')
        Paginas para no saturar la vista con una larga lista
!-->
<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
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

                {{ Form::open(array('action' => 'UserController@search', 'role' => 'search', 'class' => 'navbar-form navbar-left', 'method' => 'GET')) }}
                    <div class="form-group">
                        {{ Form::text('searchbox', '', array('class' => 'form-control', 'placeholder' => 'Buscar')) }}    
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                {{ Form::close() }}
 
                <ul class="nav navbar-nav navbar-right form-group">
                    <li><a href="/user/profile">Perfil</a></li>
                    <li>&nbsp;</li>
                    <!-- Esto: href="/../../../logout" es para que se pueda utilizar una sóla ruta para logout y no hacer una ruta por cada vista que tenemos abierta, este enlace haría referencia a http://localhost:8000/logout -->
                    <li class = "logout"><a href="/../../../logout" class="btn btn-danger"><span>Cerrar sesión</span></a></li>
                    <li>&nbsp;</li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class = "panel panel-primary">
            <div class = "panel-heading list-buttons"><h4>@yield('tituloTabla')</h4></div>
            <div class = "supplier-form">
                <address>
                    @yield('info')
                </address>
            </div>
        </div>
        <div class = "botonVolver">
            @yield('botonVolver')
        </div>    
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>