@extends('layouts/crear')


@section('titulo')
Admon-Paq - Editar Usuario
@stop

@section('navegacion')
        <li><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li class="active"><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Editar Usuario
@stop

@section('formulario')
{{Form::model($user, array('files'=>true))}}
    <div class = "form-group">
        {{ Form::label('user', 'Nombre de usuario') }}
        {{ Form::text('user', Input::old('user'), array('class' => 'form-control', 'readonly' => 'readonly', 'required' => 'required')) }}
        {{ $errors->first('user', '<span class="label label-danger">:message</span>') }}
    </div>
                
    <div class = "form-group">
        {{ Form::label('password', 'Contraseña') }}
        {{ Form::text('password', $pass_decrypt, array('class' => 'form-control', 'placeholder' => 'Contraseña', 'required' => 'required')) }}
        {{ $errors->first('password', '<span class="label label-danger">:message</span>') }}
    </div>

    <div class = "form-group">
        {{ Form::label('type', 'Tipo de usuario') }}
        {{ Form::select('type', [$user_no_selected_id => $user_no_selected_name, $user_selected_id => $user_selected_name] , [$user_selected_name => $user_selected_id], array('class' => 'form-control')) }}
        
    </div>

    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
        <a href="/user/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop