@extends('layouts.ver')

@section('titulo')
Admon-Paq - Usuario {{$users->id}}
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li class="active"><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Usuario: {{$users->user}}
@stop


@section('nombreColumnas')
<th>#</th>
<th>Usuario</th>
<th>Tipo de Usuario</th>
<th>Contraseña</th>
@stop

@section('contenidoTabla')
@if (count($users) > 0)
    <tr>
        <td>{{$users->id}}</td>
        <td>{{$users->user}}</td>
        <td>{{$user_type_id->name}}</td>        
        <td>{{$pass_decrypt}}</td>
    </tr>
@else
No hay Usuarios registrados.
@endif
@stop

@section('botonVolver')
<a href="/user/list" class="btn btn-success">Volver a lista de Usuarios</a>
@stop

