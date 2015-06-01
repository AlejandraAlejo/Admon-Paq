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

@section('info')
<b>Password:</b> {{$pass_decrypt}}
<br />
<b>Tipo de Usuario:</b> {{$user_type_id->name}}
@stop

@section('botonVolver')
<a href="/user/list" class="btn btn-success">Volver a lista de Usuarios</a>
@stop

