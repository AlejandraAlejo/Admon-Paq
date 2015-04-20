<!DOCTYPE html>
<html>
    <head>
        <title>Admon-Paq - Crear Usuario</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
    </head>
    <body>
	    <header id="header" class="header">
	        <nav class="navbar navbar-default" role="navigation">
	  
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
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav">
	    <li class="active"><a href="#">Usuarios</a></li>
	      <li><a href="#">Ingresos</a></li>
	      <li><a href="#">Proveedores</a></li>
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
	            <h1 align="center">Nuevo Usuario</h1>
	            {{Form::open(array(
	                'action' => 'UserController@create',
	                'class' => 'form-horizontal',
	                'role' => 'form'
	            ))}}
	            <div class="form-group">
	                {{Form::label('id', 'ID', array(
	                    'class' => 'col-lg-3 control-label'
	                ))}}
	                <div class="col-lg-5">
	                    {{Form::text('id', null, array(
	                        'class' => 'form-control',
	                        'id' => 'id',
	                        'placeholder' => 'ID'
	                    ))}}
	                </div>
	            </div>
	            <div class="form-group">
	                {{Form::label('user', 'Nombre usuario', array(
	                    'class' => 'col-lg-3 control-label'
	                ))}}
	                <div class="col-lg-5">
	                    {{Form::text('user', null, array(
	                        'class' => 'form-control',
	                        'id' => 'user',
	                        'placeholder' => 'Nombre usuario'
	                    ))}}
	                </div>
	            </div>
	            <div class="form-group">
	                {{Form::label('password', 'Contraseña', array(
	                    'class' => 'col-lg-3 control-label'
	                ))}}
	                <div class="col-lg-5">
	                    {{Form::text('password', null, array(
	                        'class' => 'form-control',
	                        'id' => 'password',
	                        'placeholder' => 'Constraseña'
	                    ))}}
	                </div>
	            </div>
	            <div class="form-group">
	                {{Form::label('created_at', 'Crear usuario', array(
	                    'class' => 'col-lg-3 control-label'
	                ))}}
	                <div class="col-lg-5">
	                    {{Form::text('created_at', null, array(
	                        'class' => 'form-control',
	                        'id' => 'created_at',
	                        'placeholder' => 'Crear usuario'
	                    ))}}
	                </div>
	            </div>
	            <div class="form-group">
	                {{Form::label('updated_at', 'Actualizar usuario', array(
	                    'class' => 'col-lg-3 control-label'
	                ))}}
	                <div class="col-lg-5">
	                    {{Form::text('updated_at', null, array(
	                        'class' => 'form-control',
	                        'id' => 'updated_at',
	                        'placeholder' => 'Actualizar usuario'
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