@extends('layouts.ver')

@section('titulo')
Admon-Paq - Proveedor {{$supplier->id}}
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li class="active"><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Proveedor: {{$supplier->name}}
@stop

@section('info')
<strong>{{$supplier->name}}</strong><br>
{{$supplier->address}}<br>
{{$supplier->rfc}}<br>
 <abbr title="Phone">Tel:</abbr> {{$supplier->phone}}
@stop

@section('botonVolver')
<a href="/supplier/list" class="btn btn-success">Volver</a>
@stop
