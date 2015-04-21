@extends('layouts/master')

@section('titulo')
Admon-Paq: Bienvenido
@stop

@section('estilos')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/paginaBienvenida.css') }}">

@stop

@section('navegacion')
    <li><a href="#">Ingresos</a></li>
    <li><a href="#">Egresos</a></li>
    <li><a href="/supplier/list">Proveedores</a></li>
    <li><a href="#">Usuarios</a></li>
@stop

@section('perfil')
    <li><a href="#">Perfil</a></li>
    <li><a href="logout" class="btn btn-default navbar-btn">Cerrar sesión</a></li>
@stop

@section('contenido')
    <div class="alert alert-info" role="alert"><h1>¡Bienvenido!</h1></div>
    <div class = "logo">
        {{ HTML::image('img/LogoAdmonPaq.png') }}
    </div>
@stop

