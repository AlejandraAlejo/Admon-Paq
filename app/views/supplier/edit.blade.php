@extends('layouts/crear')


@section('titulo')
Admon-Paq - Crear Proveedor
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li class="active"><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('perfil')
    <li><a href="/user/profile">Perfil</a></li>
    <li><a href="/../../logout" class="btn btn-danger font-white">Cerrar sesión</a></li>
@stop

@section('tituloTabla')
Registrar Proveedor
@stop

@section('formulario')
{{Form::model($supplier, array('files'=>true))}}
    <div class = "form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Nombre', 'required' => 'required')) }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', '', array('class' => 'form-control', 'placeholder' => 'Dirección', 'required' => 'required')) }}
    </div>

    <div class = "form-group">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', '', array('class' => 'form-control', 'placeholder' => 'Teléfono')) }}
    </div>

    <div class = "form-group">
        {{ Form::label('rfc', 'RFC') }}
        {{ Form::text('rfc', '', array('class' => 'form-control', 'placeholder' => 'RFC', 'required' => 'required')) }}
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-success')) }}
        <a href="/supplier/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop