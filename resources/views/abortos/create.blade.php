@section('title')
SRB - Abortos
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
            <h5 class="card-title">Abortos</h5>
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
        {!! Form::open(array('url'=>'abortos','method'=>'POST','autocomplete'=>'off')) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código o numeración de la Madre</label>
                    <input type="text" name="animal_madre" readonly value="{{ $embarazos->animal_madre }}"
                        class="form-control" placeholder="Código Animal" data-toggle="tooltip" data-placement="top"
                        title="Este campo no es editable">
    
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Tipo de Aborto</label>
                    <select class="form-control" name="tipo" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Tipo de Aborto">
                        <option value="" disabled="" selected="">Seleccione tipo: </option>
                        <option value="Espontáneo" @if (old('tipo')=="Espontáneo" ) {{ 'selected '}} @endif>Espontáneo</option>
                        <option value="Inducido" @if (old('tipo')=="Inducido" ) {{ 'selected '}} @endif>Inducido</option>
                        <option value="Infeccioso" @if (old('tipo')=="Infeccioso" ) {{ 'selected '}} @endif>Infeccioso</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Aborto</label>
                    <input type="date" name="fecha" class="form-control" data-toggle="tooltip"
                        min="{{ $embarazos->embarazos_fecha }}" value="{{ old('fecha') }}" data-placement="top" title="Seleccione fecha de aborto">
    
                    
                </div>
            </div>
            <input style="display: none" name=embarazo_id value="{{ $embarazos->embarazos_id }}">
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