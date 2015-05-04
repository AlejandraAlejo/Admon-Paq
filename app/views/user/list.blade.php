@extends('layouts.listar')

@section('titulo')
Admon-Paq - Usuarios
@stop

@section('navegacion')
        <li><a href="/incomes">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li class="active"><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Usuarios
@stop

@section('botonCrear')
<a href="/user/createForm" class="btn btn-success">Crear</a>
@stop

@section('nombreColumnas')
<th>#</th>
<th>Usuario</th>
@stop

@section('contenidoTabla')
@if (count($users) > 0)
    @foreach ($users as $user) 
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->user}}</td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="View">
                <button class="btn btn-success btn-xs" data-title="View" >
                    <span class="glyphicon glyphicon-eye-open"></span>
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
No hay Usuarios registrados.
@endif
@stop

@section('paginacion')
{{$users->links()}}
@stop