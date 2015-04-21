@extends('layouts.listar')

@section('titulo')
Admon-Paq - Crear Proveedor
@stop

@section('navegacion')
        <li><a href="#">Ingresos</a></li>
        <li><a href="#">Egresos</a></li>
        <li class="active"><a href="#">Proveedores</a></li>
        <li><a href="#">Usuarios</a></li>
@stop

@section('tituloTabla')
Proveedores
@stop

@section('botonCrear')
<a href="/supplier/create" class="btn btn-success">Crear</a>
@stop

@section('nombreColumnas')
<th>#</th>
<th>Nombre</th>
<th>Ver</th>
@stop

@section('contenidoTabla')
@if (count($suppliers) > 0)
    @foreach ($suppliers as $supplier) 
    <tr>
        <td>{{$supplier->id}}</td>
        <td>{{$supplier->name}}</td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="View">
                <button class="btn btn-success btn-xs" data-title="View" >
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </p>
        </td >
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Edit">
                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" >
                    <span class="glyphicon glyphicon-pencil"></span>
                </button>
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