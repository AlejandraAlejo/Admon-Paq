<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    @yield('estilos')
</head>
<body>

    <header id="header" class="header">
        <nav class="navbar navbar-default" role="navigation">
            <!-- El logotipo y el icono que despliega el menú se agrupan
                para mostrarlos mejor en los dispositivos móviles -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Menú</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">AdmonPAQ</a>
            </div>
 
            <!-- Agrupar los enlaces de navegación, los formularios y cualquier
                otro elemento que se pueda ocultar al minimizar la barra -->
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
 
                <div class='navbar-form navbar-right'>
                    <a href="/user/profile">Perfil: {{ App::make("UserController")->viewUserName() }}</a>&nbsp;&nbsp;
                    <a href="/../../logout" class="btn btn-danger">Cerrar sesión</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        @yield('contenido')
    </div>
</body>
</html>