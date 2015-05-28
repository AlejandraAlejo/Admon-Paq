@extends('layouts.listar')

@section('titulo')
Admon-Paq - Crear Egreso
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li class="active"><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Egresos
@stop

@section('botonCrear')
<a href="/expense/createForm" class="btn btn-success">Crear</a>
@stop

@section('nombreColumnas')
<th>Concepto</th>
@stop

@section('contenidoTabla')
@if (count($expenses) > 0)
    @foreach ($expenses as $expense) 
    <tr>
        <td>{{$expense->description}}</td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="View">
                <a href = "/expense/view/{{$expense->id}}">
                    <button class="btn btn-success btn-xs" data-title="View" >
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                </a>    
            </p>
        </td >
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Edit">
                <a href="/expense/update/{{$expense->id}}">
                    <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" >
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
No hay Egresos registrados.
@endif
@stop

@section('paginacion')
{{$expenses->links()}}
@stop