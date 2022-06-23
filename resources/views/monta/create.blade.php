@section('title')
SRB - Montas
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
            <h5 class="card-title">Montas o iseminaciones</h5>
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
        {!! Form::open(array('url'=>'monta','method'=>'POST','autocomplete'=>'off')) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código de la Madre</label>
                    <select name="código_madre" class="form-control selectpicker" data-live-search="true" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Código de la madre">
                        <option value="" disabled="" selected="">Seleccione Código: </option>
                        @foreach ($animales as $r)
                        @if (old('código_madre')==$r->animal_id )
                        <option selected value="{{ $r->animal_id }}">{{ $r->animal_id}}</option>
                        @else
                        @if ($r->animal_sexo=='Hembra')
                        <option value="{{ $r->animal_id }}">
                            {{ $r->animal_id}}
                        </option>
                        @endif
                        @endif
                        @endforeach
                   
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                <div class="form-group">
                    <label>Código del Padre</label>
                    <select name="código_padre" class="form-control selectpicker" data-live-search="true" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Código del padre">
                        <option value="" disabled="" selected="">Seleccione Código: </option>
                        @foreach ($animales as $r)
                        @if (old('código_padre')==$r->animal_id )
                        <option selected value="{{ $r->animal_id }}">{{ $r->animal_id}}</option>
                        @else
                        @if ($r->animal_sexo=='Macho')
                        <option value="{{ $r->animal_id }}">
                            {{ $r->animal_id}}
                        </option>
                        @endif
                        @endif
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Monta</label>
                    <input type="date" name="fecha" value="{{ old('fecha') }}" class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Seleccione fecha de embarazo">

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