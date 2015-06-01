@extends('layouts/master')

@section('titulo')
Admon-Paq: Bienvenido
@stop

@section('estilos')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/paginaBienvenida.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/flatly/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

@stop

@section('navegacion')
    <li><a href="/incomes/list">Ingresos</a></li>
    <li><a href="/expense/list">Egresos</a></li>
    <li><a href="/supplier/list">Proveedores</a></li>
    <li><a href="/user/list">Usuarios</a></li>
@stop

@section('contenido')
    @if(Session::has('message'))
        <div class="alert alert-{{Session::get('class')}} alert dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{Session::get('message')}}
        </div>
    @endif
    <div class = "logo">
        {{ HTML::image('img/LogoAdmonPaq.png') }}
    </div>
@stop

