@extends('layouts.perfil')

@section('titulo')
Admon-Paq - Mi perfil
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Usuario: {{$currentUser->user}}
@stop

@section('info')
Password: {{$pass_decrypt}}
<br />
Tipo de Usuario: {{$user_type_id->name}}
@stop

@section('botonVolver')
<table class="profile-options">
    <tr>
        <td><a href="/user/list" class="btn btn-success">Volver a lista de Usuarios</a></td>
        <td></td>
        <td><a href="/user/update/{{$currentUser->id}}" class="btn btn-warning">Editar perfil</a></td>
    </tr>
</table>
@stop
