@section('title')
SRB - Nutrición
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
            <h5 class="card-title">Nutrición</h5>
        </div>
        <div class="card-body">

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Código del animal</label>
                    <select  id="select-animal3" name="animal" class="form-control selectpicker" data-live-search="true" data-toggle="tooltip" data-placement="top"
                        title="Seleccione Código del animal">
                        <option value="" disabled="" selected="">Seleccione Código: </option>
                        @foreach ($animales as $r)
                        <option value="{{ $r->animal_id }}">
                            {{ $r->animal_id}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label>Peso del animal</label>
                <div class="form-group">
                    <input id="peso" type="text" readonly value="" class="form-control">
                </div>
            </div>
    
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>dieta recomendada</label>
                    <textarea id="dieta" rows="2" name="causa" readonly class="form-control">
                    </textarea>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Fin col -->
<!-- FIN Contentbar -->
@endsection
