@extends('layouts/master')


@section('titulo')
Admon-Paq - Crear Proveedor
@stop

@section('estilos')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">
@stop

@section('navegacion')
        <li><a href="#">Ingresos</a></li>
        <li><a href="#">Egresos</a></li>
        <li class="active"><a href="/supplier/list">Proveedores</a></li>
        <li><a href="#">Usuarios</a></li>
@stop

@section('perfil')
    <li><a href="#">Perfil</a></li>
    <li><a href="#" class="btn btn-danger font-white">Cerrar sesión</a></li>
@stop

@section('contenido')
    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">
        {{ Session::get('message')}}
    </div>
    @else
    <br><br>
    @endif
    <div class = "panel panel-primary">
        <div class = "panel-heading">Registrar Proveedor</div>
        <div class = "supplier-form">
        {{ Form::open(array('action' => 'SupplierController@create')) }}
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
                {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
                <a href="/supplier/list" class="btn btn-danger">Cancelar</a>
            </div>
        {{ Form::close() }}
    </div>
    </div>
@stop