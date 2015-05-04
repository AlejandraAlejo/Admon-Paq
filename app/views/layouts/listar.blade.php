<!--
    SECCIONES DE LA PLANTILLA PARA LLENAR
        Ejemplo de como implementar esta plantilla: app/views/supplier/list.blade.php

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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
 
                <ul class="nav navbar-nav navbar-right form-group">
                    <li><a href="#">Perfil</a></li>
                    <li>&nbsp;</li>
                    <li class = "logout"><a href="logout" class="btn btn-danger"><span>Cerrar sesión</span></a></li>
                    <li>&nbsp;</li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class = "panel panel-primary">
            <div class = "panel-heading list-buttons"><h4>@yield('tituloTabla')</h4></div>
            <div class = "supplier-form">
                @yield('botonCrear')
                <table class="table table-hover">
                    <thead>
                        @yield('nombreColumnas')
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </thead>

                    <tbody>
                        @yield('contenidoTabla')
                    </tbody>
                </table>
                @yield('paginacion')
            </div>
        </div>
    </div>
</body>
</html>