@extends('layouts/crear')


@section('titulo')
Admon-Paq - Crear ingreso
@stop

@section('navegacion')
        <li class="active"><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Registrar Ingreso
@stop


@section('formulario')
{{ Form::open(array('action' => 'IncomesController@create')) }}
    <div class = "form-group">
        {{ Form::label('description', 'Concepto') }}
        {{ Form::text('description', Input::old('description'),array('class' => 'form-control', 'placeholder' => 'Concepto')) }}
        {{ $errors->first('description', '<span class="label label-danger">:message</span>') }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('date', 'Fecha del Ingreso (Año-Mes-Día)') }}
        {{ Form::text('date', Input::old('date'), array('id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Fecha')) }}
        {{ $errors->first('date', '<span class="label label-danger">:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::label('amount', 'Cantidad') }}
        {{ Form::text('amount', Input::old('amount'), array('class' => 'form-control', 'placeholder' => 'Cantidad')) }}
        {{ $errors->first('amount', '<span class="label label-danger">:message</span>') }}
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/incomes/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop