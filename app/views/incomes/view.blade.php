@extends('layouts.ver')

@section('titulo')
Admon-Paq - Ingreso {{$income->id}}
@stop

@section('navegacion')
        <li class="active"><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Ingreso: {{$income->description}}
@stop

@section('info')
<strong>{{$income->description}}</strong><br>
{{$income->date}}<br>
{{$income->amount}}<br>
@stop

@section('botonVolver')
<a href="/incomes/list" class="btn btn-default">Volver</a>
@stop

@section('botonEditar')
<a href="/incomes/edit/id" class="btn btn-warning">Editar</a>
@stop