@section('title')
SRB - Partos
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
            <h5 class="card-title">Partos</h5>
            En esta sección solo se pueden actualizar datos referentes al parto( fecha de parto, problemas durante el parto),
            <br>
            si desea actualizar datos del hijo hágalo desde la sección animales.
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
        {!! Form::model($parto,['method'=>'PATCH','route'=>['partos.update',$parto->partos_id]]) !!}
        {{ Form::token() }}
        <div class="row">

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="nacimiento"
                        min="{{ $parto->fecha_aproximada->subDays(5)->toDateString()}}"
                        max="{{ $parto->fecha_aproximada->addDays(5)->toDateString()}}"
                        value="{{ old('nacimiento',$parto->partos_fecha) }}" id="Nacimiento" class="form-control" data-toggle="tooltip"
                        data-placement="top" title="Seleccione fecha de nacimiento">
                </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Problemas durante el parto</label>
                    <select id="Problema" name="complicaciones" class="form-control" required="" data-toggle="tooltip"
                        data-placement="top" title="Seleccione si hubo problemas o no durante el parto">
                        <option value="" disabled="" selected="">Seleccione: </option>
                        <option value="SI" @if (old('complicaciones',$parto->partos_complicaciones)=="SI" ) {{ 'selected ' }} @endif>Si </option>
                        <option value="NO" @if (old('complicaciones',$parto->partos_complicaciones)=="NO" ) {{ 'selected ' }} @endif> No</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="problema" style="display:none; ">
                <div class="form-group">
                    <label>Problema</label>
                    <input type="text" name="descripción" value="{{ old('descripción',$parto->partos_descripción) }}" class="form-control"
                        placeholder="escribir problema" maxlength="250" data-toggle="tooltip" data-placement="top"
                        title="Problema">
                    <label class="highlight"></label>
                    <label class="bar"></label>

                </div>
            </div>
            <input style="display: none" name="embarazo_id" value="{{ $parto->embarazos_id }}">
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