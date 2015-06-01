<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admon-Paq: Inicio de Sesión</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/login.css') }}">
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    </head>
    <body>
        <div class = "container">
            @if(Session::has('message'))
                <div class="alert alert-{{Session::get('class')}}">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{Session::get('message')}}
                </div>
            @endif
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
                            {{ Form::submit('Ingresar', array('class' => 'btn btn-warning btn-lg')) }}
                        </div>
                {{ Form::close() }}
            </div>  
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
