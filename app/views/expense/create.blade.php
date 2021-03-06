@extends('layouts/crear')


@section('titulo')
Admon-Paq - Egresos
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li class="active"><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Registrar Egreso
@stop

@section('formulario')
{{ Form::open(array('action' => 'ExpenseController@create')) }}
    <div class = "form-group">
        {{ Form::label('description', 'Concepto') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control', 'placeholder' => 'Concepto', 'required' => 'required')) }}
        {{ $errors->first('description', '<span class="label label-danger">:message</span>') }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('date', 'Fecha del Egreso (Año-Mes-Día)') }}
        {{ Form::text('date', Input::old('date'), array('id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Fecha', 'required' => 'required')) }}
        {{ $errors->first('date', '<span class="label label-danger">:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::label('amount', 'Cantidad') }}
        {{ Form::text('amount', Input::old('amount'), array('class' => 'form-control', 'placeholder' => 'Cantidad', 'required' => 'required')) }}
        {{ $errors->first('amount', '<span class="label label-danger">:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::label('supplier_id', 'Proveedor') }}
        {{ Form::select('supplier_id', $supplier_id, '',array('class' => 'form-control')) }}   
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/expense/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop