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
                    <button class="btn btn-info btn-xs" data-title="View" >
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                </a>    
            </p>
        </td >
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Edit">
                <a href="/expense/update/{{$expense->id}}">
                    <button class="btn btn-warning btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit_package" >
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </a>
            </p>
        </td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Delete">
                <button type='button' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-expenseid="{{$expense->id}}" data-target='#delete_expense'>
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

@section('modal')
<div class="modal fade" id="delete_expense" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="Heading">Eliminar egreso</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este egreso?
                </div>
            </div>
            <div class="modal-footer ">
                {{Form::open(array('url'=>'expense/delete'))}}
                    {{ Form::hidden('expenseid', '', array('id' => 'expenseid')) }}
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
    $('#delete_expense').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('expenseid')
        var modal = $(this)
        modal.find('.modal-footer input').val(recipient)
    })
</script>
@stop