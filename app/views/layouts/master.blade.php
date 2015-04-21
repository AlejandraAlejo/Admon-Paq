<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo')</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </form>
 
                <ul class="nav navbar-nav navbar-right">
                    @yield('perfil')
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        @yield('contenido')
    </div>
</body>
</html>