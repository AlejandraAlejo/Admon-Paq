<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Datos de ingreso </title>
 </head>
 <body>
    <h1> {{ $income->description }} </h1>
    <ul>
       <li> Descripcion: {{ $income->description }} </li>
       <li> Fecha: {{ $income->datel }} </li>
       <li> Cantidad: {{ $income->amount }} </li>
       <li> Creado: {{ $income->created_at }} </li>
       <li> Modificado: {{ $income->updated_at }} </li>
    </ul>
    <p> {{ link_to('incomes', 'Volver atrás') }} </p>
 </body>
</html>