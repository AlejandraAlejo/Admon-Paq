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

@section('tituloTabla')
Registrar Usuario
@stop

@section('formulario')
{{ Form::open(array('action' => 'UserController@create')) }}
    <div class = "form-group">
        {{ Form::label('user', 'Nombre de usuario') }}
        {{ Form::text('user', Input::old('user'), array('class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required' => 'required')) }}
        {{ $errors->first('user', '<span class="label label-danger">:message</span>') }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::password('password', array('class' => 'form-control', 'required' => 'required')) }}
        {{ $errors->first('password', '<span class="label label-danger">:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::label('type', 'Tipo de usuario') }}
        {{ Form::select('type', $type, '', array('class' => 'form-control')) }}   
        
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-success')) }}
        <a href="/user/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop