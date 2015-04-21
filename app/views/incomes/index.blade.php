<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Ingresos </title>
 </head>
 <body>
    <h1> Ingresos </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    <p> {{ link_to ('incomes/create', 'Crear nuevo ingreso') }} </p>
    @if($incomes->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Descripcion </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Fecha </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Nivel </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Cantidad </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Creado </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Actualizado </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($incomes as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->description }} </td>
                <td style="text-align: center;"> {{ $item->date }} </td>
                <td style="text-align: center;"> {{ $item->amount }} </td>
                <td style="text-align: center;"> {{ $item->created_at }} </td>
                <td style="text-align: center;"> {{ $item->updated_at }} </td>
                <td style="text-align: center;"> {{ link_to('incomes/'.$item->id, 'Ver') }} </td>
                <td style="text-align: center;"> {{ link_to('incomes/'.$item->id.'/edit', 'Editar') }} </td>
                <td style="text-align: center;"> 
   					{{ Form::open(array('url' => 'incomes/'.$item->id)) }}
      				{{ Form::hidden("_method", "DELETE") }}
      				{{ Form::submit("Eliminar") }}
   					{{ Form::close() }}
				</td>
             </tr>
          @endforeach
          </tbody>
       </table>
    @else
       <p> No se han encontrado ingresos </p>
    @endif
 </body>
</html>