@extends('layouts.buscar')

@section('titulo')
Admon-Paq - Búsqueda
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Búsqueda
@stop

@section('botonCrear')
@stop

@section('nombreColumnas')
<th></th>
@stop

@section('contenidoTabla')
@if(count($user_results) > 0 || count($incomes_results) > 0 || count($expenses_results) > 0 || count($suppliers_results) > 0)
    @if (count($user_results) > 0)
        @foreach ($user_results as $user_result) 
            <tr>
                <td>{{$user_result->user}}</td>
                <td class="list-buttons">
                    <p data-placement="top" data-toggle="tooltip" title="View">
                        <a href = "/user/view/{{$user_result->id}}">
                            <button class="btn btn-info btn-xs" data-title="View" >
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </button>
                        </a>
                    </p>
                </td >
            </tr>
        @endforeach    
    @endif

    @if (count($incomes_results) > 0)
        @foreach ($incomes_results as $income_result) 
            <tr>
                <td>{{$income_result->description}}</td>
                <td class="list-buttons">
                    <p data-placement="top" data-toggle="tooltip" title="View">
                        <a href = "/incomes/view/{{$income_result->id}}">
                            <button class="btn btn-info btn-xs" data-title="View" >
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </button>
                        </a>
                    </p>
                </td >
            </tr>
        @endforeach 
    @endif

    @if (count($expenses_results) > 0)
        @foreach ($expenses_results as $expense_result) 
            <tr>
                <td>{{$expense_result->description}}</td>
                <td class="list-buttons">
                    <p data-placement="top" data-toggle="tooltip" title="View">
                        <a href = "/expense/view/{{$expense_result->id}}">
                            <button class="btn btn-info btn-xs" data-title="View" >
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </button>
                        </a>
                    </p>
                </td >
            </tr>
        @endforeach    
    @endif

    @if (count($suppliers_results) > 0)
        @foreach ($suppliers_results as $supplier_result) 
            <tr>
                <td>{{$supplier_result->name}}</td>
                <td class="list-buttons">
                    <p data-placement="top" data-toggle="tooltip" title="View">
                        <a href = "/supplier/view/{{$supplier_result->id}}">
                            <button class="btn btn-info btn-xs" data-title="View" >
                                <span class="glyphicon glyphicon-eye-open"></span>
                            </button>
                        </a>
                    </p>
                </td >
            </tr>
        @endforeach
    @endif
@else
    No hay coincidencias.
@endif
@stop

@section('paginacion')

@stop