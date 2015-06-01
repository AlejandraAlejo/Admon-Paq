@extends('layouts/crear')


@section('titulo')
Admon-Paq - Crear Ingreso
@stop

@section('navegacion')
        <li class="active"><a href="/incomes/list">Ingresos</a></li>
        <li><a href="/expense/list">Egresos</a></li>
        <li><a href="/supplier/list">Proveedores</a></li>
        <li><a href="/user/list">Usuarios</a></li>
@stop

@section('tituloTabla')
Registrar Ingreso
@stop

@section('formulario')
{{Form::model($incomes, array('files'=>true))}}
    <div class = "form-group">
        {{ Form::label('description', 'Concepto') }}
        {{ Form::text('description', Input::old('description'),array('class' => 'form-control', 'placeholder' => 'Concepto')) }}
        <div class="bg-danger">{{$errors->first('description')}}</div>
    </div>
                
    <div class = "form-group">
        {{ Form::label('date', 'Fecha del ingreso') }}
        {{ Form::text('date', Input::old('date'), array('id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'Fecha')) }}
        <div class="bg-danger">{{$errors->first('date')}}</div>
    </div>

    <div class = "form-group">
        {{ Form::label('amount', 'Cantidad') }}
        {{ Form::text('amount', Input::old('amount'), array('class' => 'form-control', 'placeholder' => 'Cantidad')) }}
        <div class="bg-danger">{{$errors->first('amount')}}</div>
    </div>
    
    <div class = "submit-button">
        {{ Form::submit('Guardar', array('class' => 'btn btn-success')) }}
        <a href="/incomes/list" class="btn btn-danger">Cancelar</a>
    </div>
{{ Form::close() }}
@stop