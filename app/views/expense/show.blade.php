@extends('layouts.ver')

@section('titulo')
Admon-Paq - Egreso {{$expenses->id}}
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li  class="active"><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Egreso: {{$expenses->description}}
@stop

@section('info')
<b>Fecha:</b> {{ date("d-m-Y",strtotime($date)) }}
<br />
<b>Cantidad:</b> ${{$amount}}
<br />
<b>Proveedor:</b> {{$supplier_id->name}}
@stop

@section('botonVolver')
<a href="/expense/list" class="btn btn-success">Volver a lista de Egresos</a>
@stop
