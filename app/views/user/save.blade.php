<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Guardar usuario </title>
 </head>
 <body>
 @if(Session::has('message'))
 <div class="alert alert-{{Session::get('class')}}">
   {{Session::get('message')}}
 </div>
 @endif
    <h1> Guardar usuario </h1>
    {{ Form::open(array('action' => 'UserController@store')) }}
       {{ Form::label ('user', 'Usuario') }}
       <br />
       {{ Form::text ('user') }}
       <br />
       {{ Form::label ('created_at', 'Creado') }}
       <br />
       {{ Form::text ('created_at') }} 
       <br /> 
       {{ Form::label ('updated_at', 'Actualizado') }}
       <br />
       {{ Form::text ('updated_at') }}
       <br />
       
       <br />
       {{ Form::submit('Guardar usuario') }}
       {{ link_to('user', 'Cancelar') }}
    {{ Form::close() }}
 </body>
</html>