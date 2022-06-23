@section('title')
SRB - Ventas
@endsection
@extends('layouts.main')
@section('style')
<!-- Range Slider css -->
<link href="{{ asset('assets/plugins/ion-rangeSlider/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <div class="breadcrumb-list">
                <ol class="breadcrumb">


                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start col -->
<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Ventas</h5>
        </div>
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        {!! Form::model($venta,['method'=>'PATCH','route'=>['ventas.update',$venta->ventas_id]]) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código del animal</label>
                    <select name="animal" class="form-control selectpicker" data-live-search="true"
                        data-toggle="tooltip" data-placement="top" title="Seleccione Código del animal">
                        <option value="" disabled="" selected="">Seleccione Código: </option>
                        <option selected value="{{ $venta->animal_id }}" >{{ $venta->animal_id }}</option>
                        @foreach ($animales as $r)
                        @if (old('animal')==$r->animal_id )
                        <option selected value="{{ $r->animal_id }}">{{ $r->animal_id}}</option>
                        @else
                        <option value="{{ $r->animal_id }}">
                            {{ $r->animal_id}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Cliente</label>
                    <select id="cliente" name="cliente" class="form-control selectpicker" data-live-search="true"
                        data-toggle="tooltip" data-placement="top" title="Seleccione Cliente">
                        <option value="" disabled="" selected="">Seleccione: </option>
                        <option value="nuevo">nuevo cliente</option>
                        @foreach ($clientes as $r)
                        @if (old('cliente',$venta->cedula_cliente)==$r->cedula )
                        <option selected value="{{ $r->cedula }}">{{ $r->nombre}}</option>
                        @else
                        <option value="{{ $r->cedula }}">
                            {{ $r->nombre}}
                        </option>
                        @endif
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Venta</label>
                    <input type="date" name="fecha" value="{{ old('fecha',$venta->ventas_fecha) }}" class="form-control"
                        data-toggle="tooltip" data-placement="top" title="Seleccione fecha de venta">
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Valor</label>
                    <input type="number" name="valor" value="{{ old('valor',$venta->ventas_valor) }}" step=".01" class="form-control"
                        data-toggle="tooltip" data-placement="top" title="Ingrese valor de venta" placeholder="valor de venta">
                </div>
            </div>

            
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div id="cedula" class="form-group " style="display:none; ">
                    <label>Cédula del nuevo cliente</label>
                    <input type="number" name="cedula" class="form-control" value="{{ old('cedula') }}"
                        placeholder="10 dígitos, solo números" data-toggle="tooltip" data-placement="top"
                        title="10 dígitos, solo números">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div id="nombre" class="form-group " style="display:none; ">
                    <label>Nombre del nuevo cliente</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="nombre" data-toggle="tooltip" data-placement="top" title="nombre del cliente">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div id="telefono" class="form-group " style="display:none; ">
                    <label>Teléfono del nuevo cliente (opcional)</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}"
                        placeholder="telefono del cliente" data-toggle="tooltip" data-placement="top"
                        title="telefono del cliente">
                </div>
            </div>
        </div>
        <div>
            <p class="text-center">
                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i>
                    &nbsp;&nbsp; Limpiar</button>
                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;
                    Guardar</button>
            </p>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@endsection