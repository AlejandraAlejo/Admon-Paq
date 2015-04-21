<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admon-Paq: Inicio de Sesión</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
    </head>
    <body>
        <div class = "container">
            <div class = "logo">
                {{ HTML::image('img/LogoAdmonPaq.png') }}
            </div>
            <div class = "panel panel-primary">
                <div class = "panel-heading">Iniciar Sesión</div>
                {{ Form::open(['url' => 'welcome']) }}
                    <div class = "form-group">
                        {{ Form::label('user', 'Usuario') }}
                        {{ Form::text('user', '', array('class' => 'form-control', 'placeholder' => 'Ingresa tu usuario')) }}
                    </div>
                    <div class = "form-group">
                        {{ Form::label('password', 'Contraseña') }}
                        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Ingresa tu contraseña')) }}
                    </div>
                        <div class = "submit-button">
                            {{ Form::submit('Ingresar', array('class' => 'btn btn-primary btn-lg')) }}
                        </div>
                {{ Form::close() }}
            </div>  
        </div>    
    </body>
</html>
