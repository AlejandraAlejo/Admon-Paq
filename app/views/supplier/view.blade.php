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
<abbr title="Dirección">{{$supplier->address}}</abbr><br>
RFC: {{$supplier->rfc}}<br>
Tel: {{$supplier->phone}}
@stop

@section('botonVolver')
<a href="/supplier/list" class="btn btn-success">Volver a lista de Proveedores</a>
@stop

@section('botonEditar')
<a href="/supplier/edit/id" class="btn btn-warning">Editar</a>
@stop