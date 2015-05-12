@extends('layouts.listar')

@section('titulo')
Admon-Paq - Crear Proveedor
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li class="active"><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Proveedores
@stop

@section('botonCrear')
<a href="/supplier/create" class="btn btn-success">Crear</a>
@stop

@section('nombreColumnas')
<th>Nombre</th>
@stop

@section('contenidoTabla')
@if (count($suppliers) > 0)
    @foreach ($suppliers as $supplier) 
    <tr>
        <td>{{$supplier->name}}</td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="View">
                <button class="btn btn-info btn-xs" data-title="View" >
                    <span class="glyphicon glyphicon-eye-open"></span>
                </button>
            </p>
        </td >
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Edit">
                <a href="{{url('/supplier/update/'.$supplier->id)}}">
                    <button type="button" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </a>
            </p>
        </td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Delete">
                <button type='button' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal'>
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </p>
        </td>
    </tr>
    @endforeach
@else
No hay Proveedores registrados.
@endif
@stop

@section('paginacion')
{{$suppliers->links()}}
@stop