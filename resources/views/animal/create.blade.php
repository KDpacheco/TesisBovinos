@section('title')
SRB - Animales
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
            <h5 class="card-title">Animales</h5>
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
        {!! Form::open(array('url'=>'animal','method'=>'POST','autocomplete'=>'off')) !!}
        {{ Form::token() }}
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código de Bien</label>
                    <input type="text" name="código" value="{{ old('código') }}" class="form-control"
                        placeholder="Código Animal" data-toggle="tooltip" data-placement="top"
                        title="Escribe el código o numeración del animal">


                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Numero de Arete</label>
                    <input type="number" name="arete" value="{{ old('arete') }}" class="form-control"
                        placeholder="Arete Animal" data-toggle="tooltip" data-placement="top"
                        title="Escribe el arete del animal">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código o numeración de la Madre</label>
                    <input type="text" name="animal_madre" value="{{ old('animal_madre') }}" class="form-control"
                        placeholder="Código Animal" data-toggle="tooltip" data-placement="top"
                        title="Escribe el código o numeración del animal">


                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código o numeración del Padre</label>
                    <input type="text" name="animal_padre" value="{{ old('animal_padre') }}" class="form-control"
                        placeholder="Código Animal" data-toggle="tooltip" data-placement="top"
                        title="Escribe el código o numeración del animal">


                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Color del animal</label>
                    <input type="text" name="color" value="{{ old('color') }}" class="form-control"
                        placeholder="Color Animal" data-toggle="tooltip" data-placement="top"
                        title="Escribe el color del animal">


                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Sexo</label>
                    <select class="form-control" id="Sex" name="sexo" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Sexo del animal">
                        <option value="" disabled="" selected="">Seleccione sexo: </option>
                        <option value="Macho" @if (old('sexo')=="Macho" ) {{ 'selected '}} @endif>Macho</option>
                        <option value="Hembra" @if (old('sexo')=="Hembra" ) {{ 'selected '}} @endif >Hembra</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Peso del animal</label>
                    <input type="number" name="peso" step=".01" value="{{ old('peso') }}" class="form-control"
                        placeholder="Peso Animal" data-toggle="tooltip" data-placement="top"
                        title="Escribe el peso del animal">


                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Para definir categoría</label>
                    <select class="form-control" id="Nivel" name="nivel" required="" data-toggle="tooltip"
                        data-placement="top" title="Seleccione Si o No">
                        <option value="" disabled="" selected="">¿Su Animal ya tuvo su primer parto o primera monta?
                        </option>
                        <option value=1 @if (old('nivel')==1 ) {{ 'selected '}} @endif>Si</option>
                        <option value=2 @if (old('nivel')==2 ) {{ 'selected '}} @endif>No</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de nacimiento</label>
                    <input type="date" name="nacimiento" id="Nacimiento" value="{{ old('nacimiento') }}"
                        class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Seleccione fecha de nacimiento">


                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Raza</label>
                    <select id="Raza" name="raza" class="form-control" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Raza del animal">
                        <option value="" disabled="" selected="">Seleccione raza: </option>
                        @foreach ($razas as $r)
                        @if(old('raza')==$r->raza_id)
                        <option value="{{ $r->raza_id }}" selected> {{ $r->raza_nombre }}</option>
                        @else
                        <option value="{{ $r->raza_id }}"> {{ $r->raza_nombre }} </option>
                        @endif
                        @endforeach
                        <option value="other" @if (old('raza')=="other" ) {{ 'selected '}} @endif>otro</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div id="raza" class="form-group " style="display:none; ">
                    <label>Raza</label>
                    <input type="text" name="nueva_raza" class="form-control" value="{{ old('nueva_raza') }}"
                        placeholder="Nueva Raza" data-toggle="tooltip" data-placement="top"
                        title="Escribe el nombre de la raza">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div id="razacr" class="form-group " style="display:none; ">
                    <label>Acrónimo de Raza</label>
                    <input type="text" name="acr" class="form-control" value="{{ old('acr') }}"
                        placeholder="Acronimo de identificacion 3 digitos" data-toggle="tooltip" data-placement="top"
                        title="Escribe el acronimo">
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