@section('title')
SRB - Gestación
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
            <h5 class="card-title">Gestación</h5>
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
        {!! Form::open(array('url'=>'embarazo','method'=>'POST','autocomplete'=>'off')) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                <div class="form-group">
                    <label>Código de la Madre</label>
                    <input type="text" readonly  name="código_madre" value= "{{ $animales->monta_madre }}" class="form-control" data-toggle="tooltip" data-placement="top"
                       >
                </div>
            </div>
            <div class="form-group" style="display: none">
                <label>Código de la Madre</label>
                <input type="text"  name="monta_id" value= "{{ $animales->monta_id }}" class="form-control" data-toggle="tooltip" data-placement="top"
                   >
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    
                <div class="form-group">
                    <label>Código del Padre</label>
                    <input type="text" readonly  name="código_padre" value= "{{ $animales->monta_padre }}" class="form-control" data-toggle="tooltip" data-placement="top"
                       >
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Embarazo</label>
                    <input type="date" name="fecha" readonly value="{{ $animales->monta_fecha }}" class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Seleccione fecha de embarazo">
                   
                </div>
            </div>
        </div>
            <div>
                <p class="text-center">
                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i
                            class="zmdi zmdi-roller"></i>
                        &nbsp;&nbsp; Limpiar</button>
                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;
                        Guardar</button>
                </p>
            </div>
        
        {!! Form::close() !!}
    </div>
</div>
@endsection