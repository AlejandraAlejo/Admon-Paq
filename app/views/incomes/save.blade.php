<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Guardar ingreso </title>
 </head>
 <body>
 @if(Session::has('message'))
 <div class="alert alert-{{Session::get('class')}}">
   {{Session::get('message')}}
 </div>
 @endif
    <h1> Guardar ingreso </h1>
    {{ Form::open(array('action' => 'IncomesController@store')) }}
       {{ Form::label ('description', 'Descripcion') }}
       <br />
       {{ Form::text ('description') }}
       <br />
       {{ Form::label ('date', 'fecha') }}
       <br />
       {{ Form::text ('date') }} 
       <br /> 
       {{ Form::label ('amount', 'Cantidad') }}
       <br />
       {{ Form::text ('amount') }}
       <br />
       {{ Form::label ('created_at', 'Creado') }}
       <br />
       {{ Form::text ('created_at') }}
       <br />
       {{ Form::label ('updated_at', 'Modificado') }}
       <br />
       {{ Form::text ('updated_at') }}
       <br />
       {{ Form::submit('Guardar ingreso') }}
       {{ link_to('incomes', 'Cancelar') }}
    {{ Form::close() }}
 </body>
</html>