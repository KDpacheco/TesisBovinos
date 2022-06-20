@section('title')
SRB - Muertes
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
            <h5 class="card-title">Muertes</h5>
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
        {!! Form::open(array('url'=>'muertes','method'=>'POST','autocomplete'=>'off')) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código del animal</label>
                    <select name="animal" class="form-control selectpicker" data-live-search="true" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Código del animal">
                        <option value="" disabled="" selected="">Seleccione Código: </option>
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
                    <label>Fecha de Muerte</label>
                    <input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Seleccione fecha de muerte">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Causa de Muerte</label>
                    <input type="text" name="causa" value="{{ old('causa') }}" class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Ingrese Causa de Muerte">
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