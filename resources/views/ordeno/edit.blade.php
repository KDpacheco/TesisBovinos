@section('title')
SRB - Ordeño
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
            <h5 class="card-title">Ordeño</h5>
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
        {!! Form::model($ordeño,['method'=>'PATCH','route'=>['ordeno.update',$ordeño->registro_ordeño_id]]) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código del Animal</label>
                    <select id="select-animal4" name="código" class="form-control selectpicker" data-live-search="true" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Código del animal">
                        <option value="" disabled="" selected="">Seleccione Código: </option>
                        @foreach ($animales as $r)
                        @if (old('código',$ordeño->animal_id)==$r->animal_id )
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
                    <label>Fecha de Ordeño</label>
                    <input id="ordeño" type="date" name="fecha" value="{{ old('fecha',$ordeño->registro_ordeño_fecha) }}" class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Fecha de ordeño">
                </div>
            </div>
    
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Cantidad de veces Ordeñada</label>
                    <input type="number" name="cantidad"  class="form-control" value="{{ old('cantidad',$ordeño->registro_ordeño_cantidad) }}" placeholder="veces ordeñada"
                        data-toggle="tooltip" data-placement="top" title="Veces ordeñada en el día">
                </div>
            </div>
    
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Litros obtenidos</label>
                    <input type="number" name="litros" step=".01" value="{{ old('litros',$ordeño->registro_ordeño_litros) }}" class="form-control" placeholder="litros"
                        data-toggle="tooltip" data-placement="top" title="Litros Obtenidos">
                </div>
            </div>
        </div>
        <input style="display: none" name="ordeño_parto" id="Ordeño_parto" >
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