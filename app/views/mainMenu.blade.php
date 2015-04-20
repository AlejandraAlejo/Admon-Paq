<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <title>Admon-Paq: Menu Principal</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
        <style>
            .navbar-btn{
                float: right;
                margin-right: 70px;
            }
            
            .menu-options{
                text-align: center;
                margin-left: 40px;
            }
            
            .panel-primary{
                width: 15%;
                display: inline-block;
                margin-left: 30px;
            }
            
        </style>    
        
        <nav class = "navbar navbar-default">
            <a class = "navbar-brand" href = "/">Admon-Paq</a>
            {{ HTML::linkAction('SessionsController@logOut', 'Cerrar sesión', array() , array('class' => 'btn btn-default navbar-btn', 'role' => 'button')) }}
        </nav> 
        <div class = "menu-options">
            <div class = "panel panel-primary">
                <div class = "panel-body">
                    {{ HTML::link('/#', 'Usuarios', '', true) }}
                </div>    
            </div>
            <div class = "panel panel-primary">
                <div class = "panel-body">
                    {{ HTML::link('/#', 'Proveedores', '', true) }}
                </div>                
            </div>
            <div class = "panel panel-primary">
                <div class = "panel-body">
                    {{ HTML::link('/#', 'Ingresos', '', true) }}
                </div>                
            </div>
            <div class = "panel panel-primary">
                <div class = "panel-body">
                    {{ HTML::link('/#', 'Egresos', '', true) }}
                </div>                
            </div>
        </div>    
    </body>
</html>

