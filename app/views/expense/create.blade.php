@extends('layouts/crear')


@section('titulo')
Admon-Paq - Crear Egreso
@stop

@section('navegacion')
        <li><a href="/incomes">Ingresos</a></li>
        <li class="active"><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="#">Usuarios</a></li>
@stop

@section('perfil')
    <li><a href="#">Perfil</a></li>
    <li><a href="#" class="btn btn-danger font-white">Cerrar sesión</a></li>
@stop

@section('tituloTabla')
Registrar Egreso
@stop

@section('formulario')
{{ Form::open(array('action' => 'ExpenseController@create')) }}
    <div class = "form-group">
        {{ Form::label('description', 'Concepto') }}
        {{ Form::text('description', '', array('class' => 'form-control', 'placeholder' => 'Concepto', 'required' => 'required')) }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('date', 'Fecha del Egreso') }}
        {{ Form::text('date', '', array('id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Fecha', 'required' => 'required')) }}
    </div>

    <div class = "form-group">
        {{ Form::label('amount', 'Cantidad') }}
        {{ Form::text('amount', '', array('class' => 'form-control', 'placeholder' => 'Cantidad')) }}
    </div>

    <div class = "form-group">
        {{ Form::label('supplier_id', 'Proveedor') }}
        {{ Form::select('supplier_id', $supplier_id, array('class' => 'form-control')) }}   
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/expense/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop