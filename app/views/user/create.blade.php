@extends('layouts/crear')


@section('titulo')
Admon-Paq - Crear Usuario
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li  class="active"><a href="/user/list">Usuarios</a></li>
@stop

@section('perfil')
   <li><a href="/user/profile">Perfil: {{ App::make("UserController")->viewUserName() }}</a></li>
    <li class = "logout"><a href="/../../logout" class="btn btn-danger"><span>Cerrar sesión</span></a></li>
@stop

@section('tituloTabla')
Registrar Usuario
@stop

@section('formulario')
{{ Form::open(array('action' => 'UserController@create')) }}
    <div class = "form-group">
        {{ Form::label('user', 'Nombre de usuario') }}
        {{ Form::text('user', Input::old('user'), array('class' => 'form-control', 'placeholder' => 'Nombre de usuario')) }}
        <div class="bg-danger">{{$errors->first('user')}}</div>
    </div>
                
    <div class = "form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
        <div class="bg-danger">{{$errors->first('password')}}</div>
    </div>

    <div class = "form-group">
        {{ Form::label('type', 'Tipo de usuario') }}
        {{ Form::select('type', $type, '', array('class' => 'form-control')) }}   
        <div class="bg-danger">{{$errors->first('type')}}</div>
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-success')) }}
        <a href="/user/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop