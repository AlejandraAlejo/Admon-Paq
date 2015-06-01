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
                <a href="{{url('/supplier/view/'.$supplier->id)}}">
                    <button class="btn btn-info btn-xs" data-title="View" >
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                </a>
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
                <button type='button' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-supplierid="{{$supplier->id}}" data-target='#delete_supplier' >
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

@section('modal')
<div class="modal fade" id="delete_supplier" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="Heading">Eliminar proveedor</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este proveedor?
                </div>
            </div>
            <div class="modal-footer ">
                {{Form::open(array('url'=>'supplier/delete'))}}
                    {{ Form::hidden('supplierid', '', array('id' => 'supplierid')) }}
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop