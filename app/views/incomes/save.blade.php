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

@section('perfil')
    <li><a href="/user/profile">Perfil</a></li>
    <li class = "logout"><a href="logout" class="btn btn-danger"><span>Cerrar sesión</span></a></li>
@stop

@section('tituloTabla')
Registrar Ingreso
@stop


@section('formulario')
{{ Form::open(array('action' => 'IncomesController@create')) }}
    <div class = "form-group">
        {{ Form::label('description', 'Concepto') }}
        {{ Form::text('description', '', array('class' => 'form-control', 'placeholder' => 'Concepto', 'required' => 'required')) }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('date', 'Fecha del ingreso') }}
        {{ Form::text('date', '', array('id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Fecha', 'required' => 'required')) }}
    </div>

    <div class = "form-group">
        {{ Form::label('amount', 'Cantidad') }}
        {{ Form::text('amount', '', array('class' => 'form-control', 'placeholder' => 'Cantidad')) }}
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/expense/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop