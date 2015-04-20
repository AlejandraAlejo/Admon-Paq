<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Guardar ingreso </title>
 </head>
 <body>
    <h1> Guardar ingreso </h1>
    {{ Form::open(array('url' => 'incomes/' . $income->id)) }}
       {{ Form::label ('description', 'Descripcion') }}
       <br />
       {{ Form::text ('description', $income->description) }}
       <br />
       {{ Form::label ('date', 'fecha') }}
       <br />
       {{ Form::text ('date', $income->date) }} 
       <br /> 
       {{ Form::label ('amount', 'Cantidad') }}
       <br />
       {{ Form::text ('amount', $income->amount) }}
       <br />
       {{ Form::label ('created_at', 'Creado') }}
       <br />
       {{ Form::text ('created_at', $income->created_at) }}
       <br />
       {{ Form::label ('updated_at', 'Modificado') }}
       <br />
       {{ Form::text ('updated_at', $income->updated_at) }}
       <br />
       {{ Form::submit('Guardar ingreso') }}
       {{ link_to('incomes', 'Cancelar') }}
    {{ Form::close() }}
 </body>
</html>