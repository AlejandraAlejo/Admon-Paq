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
    <li><a href="/user/profile">Perfil: {{ App::make("UserController")->viewUserName() }}</a></li>
    <li><a href="/../../logout" class="btn btn-danger font-white">Cerrar sesión</a></li>
@stop

@section('tituloTabla')
Registrar Proveedor
@stop

@section('formulario')
{{ Form::open(array('action' => 'SupplierController@create')) }}
    <div class = "form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
        <div class="bg-danger">{{$errors->first('name')}}</div>
    </div>
                
    <div class = "form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', Input::old('address'), array('class' => 'form-control', 'placeholder' => 'Dirección')) }}
        <div class="bg-danger">{{$errors->first('address')}}</div>
    </div>

    <div class = "form-group">
        {{ Form::label('phone', 'Teléfono') }}
        {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control', 'placeholder' => 'Teléfono')) }}
        <div class="bg-danger">{{$errors->first('phone')}}</div>
    </div>

    <div class = "form-group">
        {{ Form::label('rfc', 'RFC') }}
        {{ Form::text('rfc', Input::old('rfc'), array('class' => 'form-control', 'placeholder' => 'RFC')) }}
        <div class="bg-danger">{{$errors->first('rfc')}}</div>
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-success')) }}
        <a href="/supplier/list" class="btn btn-danger">Cancelar</a>
        <div class="bg-danger">{{$errors->first('description')}}</div>
    </div>
{{ Form::close() }}
@stop