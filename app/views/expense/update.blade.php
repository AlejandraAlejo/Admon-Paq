@extends('layouts/crear')


@section('titulo')
Admon-Paq - Editar Egreso
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li  class="active"><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('perfil')
    <li><a href="/user/profile">Perfil: {{ App::make("UserController")->viewUserName() }}</a></li>
    <li class="logout"><a href="/../../logout" class="btn btn-danger font-white">Cerrar sesión</a></li>
@stop

@section('tituloTabla')
Editar Usuario
@stop

@section('formulario')
{{Form::model($expense, array('files'=>true))}}
    <div class = "form-group">
        {{ Form::label('description', 'Concepto') }}
        {{ Form::text('description', $expense->description, array('class' => 'form-control', 'placeholder' => 'Concepto', 'required' => 'required')) }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('date', 'Fecha') }}
        {{ Form::text('date', date("d-m-Y",strtotime($date)), array('id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Fecha', 'required' => 'required')) }}        
    </div>

    <div class = "form-group">
            {{ Form::label('amount', 'Cantidad') }}
            {{ Form::text('amount', $amount, array('class' => 'form-control', 'placeholder' => 'Cantidad', 'required' => 'required')) }}
        </div>

    <div class = "form-group">
        {{ Form::label('supplier_name', 'Proveedor') }}
        {{ Form::select('supplier_name', $supplier_name, Input::old('supplier_name'), array('class' => 'form-control')) }}
    </div>

    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/expense/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop