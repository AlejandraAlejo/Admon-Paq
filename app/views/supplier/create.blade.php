<!DOCTYPE html>
<html>
<head>
    <title>Admon-Paq - Crear Proveedor</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
</head>
<body>

    <header id="header" class="header">
        <nav class="navbar navbar-default" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">AdmonPAQ</a>
  </div>
 
  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="#">Ingresos</a></li>
      <li><a href="#">Egresos</a></li>
      <li class="active"><a href="#">Proveedores</a></li>
      <li><a href="#">Egresos</a></li>
    </ul>
 
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Buscar">
      </div>
      <button type="submit" class="btn btn-default">Enviar</button>
    </form>
 
    <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Perfil</a></li>
        <li><a href="#">Cerrar sesión</a></li>
    </ul>
  </div>
</nav>
    </header>

    <div class="container">
        <div class="panel panel-success">
            <h1 align="center">Nuevo Proveedor</h1>
            {{Form::open(array(
                'action' => 'SupplierController@create',
                'class' => 'form-horizontal',
                'role' => 'form'
            ))}}
            <div class="form-group">
                {{Form::label('name', 'Nombre', array(
                    'class' => 'col-lg-3 control-label'
                ))}}
                <div class="col-lg-5">
                    {{Form::text('name', null, array(
                        'class' => 'form-control',
                        'id' => 'name',
                        'placeholder' => 'Nombre'
                    ))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('address', 'Dirección', array(
                    'class' => 'col-lg-3 control-label'
                ))}}
                <div class="col-lg-5">
                    {{Form::text('address', null, array(
                        'class' => 'form-control',
                        'id' => 'address',
                        'placeholder' => 'Dirección'
                    ))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('phone', 'Teléfono', array(
                    'class' => 'col-lg-3 control-label'
                ))}}
                <div class="col-lg-5">
                    {{Form::text('phone', null, array(
                        'class' => 'form-control',
                        'id' => 'phone',
                        'placeholder' => 'Teléfono'
                    ))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('rfc', 'RFC', array(
                    'class' => 'col-lg-3 control-label'
                ))}}
                <div class="col-lg-5">
                    {{Form::text('rfc', null, array(
                        'class' => 'form-control',
                        'id' => 'address',
                        'placeholder' => 'RFC'
                    ))}}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-10">
                    {{Form::button('Crear', array(
                        'type' => 'submit',
                        'class' => 'btn btn-default'
                    ))}}
                </div>
                <div class="col-lg-offset-3 col-lg-10">
                    {{Form::button('Cancelar', array(
                        'type' => 'button',
                        'class' => 'btn btn-default'
                    ))}}
                </div>
            </div>
            {{Form::close()}}
        </div>
        @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('class') }}">
                {{ Session::get('message')}}
            </div>
            @endif
    </div>

    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>