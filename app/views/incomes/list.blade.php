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

<th>Concepto</th>
@stop

@section('contenidoTabla')
@if (count($incomes) > 0)
    @foreach ($incomes as $income) 
    <tr>
        <td>{{$income->description}}</td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="View">
                <a href="{{url('/incomes/view/'.$income->id)}}">
                    <button class="btn btn-info btn-xs" data-title="View" >
                        <span class="glyphicon glyphicon-eye-open"></span>
                    </button>
                </a>
            </p>
        </td >
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Edit">
                <a href="{{url('/incomes/update/'.$income->id)}}">
                    <button type="button" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </a>
            </p>
        </td>
        <td class="list-buttons">
            <p data-placement="top" data-toggle="tooltip" title="Delete">
                <button type='button' class='btn btn-danger btn-xs' data-title='Delete' data-toggle='modal' data-incomeid="{{$income->id}}" data-target='#delete_income' >
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

@section('modal')
<div class="modal fade" id="delete_income" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
                <h4 class="modal-title" id="Heading">Eliminar ingreso</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <span class="glyphicon glyphicon-warning-sign"></span> ¿Está seguro que desea eliminar este ingreso?
                </div>
            </div>
            <div class="modal-footer ">
                {{Form::open(array('url'=>'incomes/delete'))}}
                    {{ Form::hidden('incomeid', '', array('id' => 'incomeid')) }}
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Si</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
+<script type="text/javascript">
    $('#delete_income').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var recipient = button.data('incomeid')
        var modal = $(this)
        modal.find('.modal-footer input').val(recipient)
    })
</script>
 @stop 