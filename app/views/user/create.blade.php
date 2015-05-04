@extends('layouts/crear')


@section('titulo')
Admon-Paq - Crear Usuario
@stop

@section('navegacion')
        <li><a href="/incomes">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li  class="active"><a href="/user/list">Usuarios</a></li>
@stop

@section('perfil')
    <li><a href="#">Perfil</a></li>
    <li class = "logout"><a href="logout" class="btn btn-danger"><span>Cerrar sesión</span></a></li>
@stop

@section('tituloTabla')
Registrar Usuario
@stop

@section('formulario')
{{ Form::open(array('action' => 'UserController@create')) }}
    <div class = "form-group">
        {{ Form::label('user', 'Nombre de usuario') }}
        {{ Form::text('user', '', array('class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required' => 'required')) }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password', '', array('class' => 'form-control', 'required' => 'required')) }}
    </div>

    <div class = "form-group">
        {{ Form::label('type', 'Tipo de usuario') }}
        {{ Form::select('type', $type, array('class' => 'form-control')) }}   
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/user/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop