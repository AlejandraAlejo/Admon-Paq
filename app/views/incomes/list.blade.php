@extends('layouts.listar')

@section('titulo')
Admon-Paq - Ingresos
@stop

@section('navegacion')
        <li class="active"><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop


@section('tituloTabla')
Ingresos
@stop

@section('botonCrear')
<a href="/incomes/createForm" class="btn btn-success">Crear</a>
@stop

@section('nombreColumnas')
<th>#</th>
<th>Concepto</th>
@stop

@section('contenidoTabla')
@if (count($incomes) > 0)
    @foreach ($incomes as $income) 
    <tr>
        <td>{{$income->id}}</td>
        <td>{{$income->description}}</td>
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
No hay ingresos registrados.
@endif
@stop

@section('paginacion')
{{$incomes->links()}}
@stop