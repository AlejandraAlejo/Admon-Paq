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
      <li class="active"><a href="#">Proveedores</a></li>
      <li><a href="#">Egresos</a></li>
@stop

@section('perfil')
    <li><a href="#">Perfil</a></li>
    <li><a href="#">Cerrar sesión</a></li>
@stop

@section('contenido')
    <div class="panel panel-success">
        <h1 align="center">Nuevo Proveedor</h1>
        <br>
        {{Form::open(array(
            'action' => 'SupplierController@create',
            'class' => 'form-horizontal',
            'role' => 'form'
        ))}}
        <div class="form-group">
            {{Form::label('name', 'Nombre', array(
                'class' => 'col-md-2 col-md-offset-3 col-xs-3 control-label'
            ))}}
            <div class="col-md-3 col-sm-3 col-lg-3">
                {{Form::text('name', null, array(
                    'class' => 'form-control',
                    'id' => 'name',
                    'placeholder' => 'Nombre'
                ))}}
            </div>
        </div>
            <div class="form-group">
            {{Form::label('address', 'Dirección', array(
                'class' => 'col-md-2 col-md-offset-3 col-xs-3 control-label'
            ))}}
            <div class="col-md-3 col-sm-3 col-lg-3">
                {{Form::text('address', null, array(
                    'class' => 'form-control',
                    'id' => 'address',
                    'placeholder' => 'Dirección'
                ))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('phone', 'Teléfono', array(
                'class' => 'col-md-2 col-md-offset-3 col-xs-3 control-label'
            ))}}
            <div class="col-md-3 col-sm-3 col-lg-3">
                {{Form::text('phone', null, array(
                    'class' => 'form-control',
                    'id' => 'phone',
                    'placeholder' => 'Teléfono'
                ))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('rfc', 'RFC', array(
                'class' => 'col-md-2 col-md-offset-3 col-xs-3 control-label'
            ))}}
            <div class="col-md-3 col-sm-3 col-lg-3">
                {{Form::text('rfc', null, array(
                    'class' => 'form-control',
                    'id' => 'address',
                    'placeholder' => 'RFC'
                ))}}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-4">
                {{Form::button('Crear', array(
                    'type' => 'submit',
                    'class' => 'btn btn-default'
                ))}}
                {{Form::button('Cancelar', array(
                    'type' => 'button',
                    'class' => 'btn btn-default'
                ))}}
            </div>
        </div>
        {{Form::close()}}
    </div>
    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('class') }}">
        {{ Session::get('message')}}
    </div>
    @endif
@stop