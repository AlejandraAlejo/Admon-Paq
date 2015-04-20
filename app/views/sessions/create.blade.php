<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <style>
                       
            h1, h2{
                text-align: center;
            }
            
            .panel{
                width: 40%;
                margin-right: auto;
                margin-left: auto;
                margin-top: 50px;
            }
            
            .panel-heading{
                font-weight: bold;
            }
            
            .form-group{
                margin-left: 10px;
                margin-right: 10px;
                margin-top: 15px;
            }
            
            .submit-button{
                margin-bottom: 20px;
                text-align: center;                
            }
            
             
        </style> 
        
        <div class = "container">
            <h1>Admon-Paq</h1>
            <h2>Aplicación para registro de ingresos y egresos</h2>
            <div class = "panel panel-primary">
                <div class = "panel-heading">Iniciar Sesión</div>
                {{ Form::open(['url' => 'store']) }}
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
