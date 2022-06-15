@section('title')
SRB - Enfermedades
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
            <h5 class="card-title">Enfermedades</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="edit-btn">
                    <thead>
                        <tr>
                            <td>Código</td>
                            <td>Código Animal </td>
                            <td>Enfermedad</td>
                            <td>Fecha de detección</td>
                            <td>Estado</td>
                            <td> <a href="enfermedades/create">
                                    <button class="btn btn-primary">
                                        NUEVO INGRESO
                                    </button>
                                </a></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enfermedades as $emb )
                        <tr>
                            <td>{{ $emb->registro_enfermedades_id }}</td>
                            <td>{{ $emb->animal_id }}</td>
                            <td>{{ $emb->enfermedad_nombre }}</td>
                            <td>{{ $emb->enfermedad_fecha }}</td>
                            <td>{{ $emb->enfermedad_estado }}</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                {{ $enfermedades->render() }}
            </div>

        </div>
    </div>
</div>
<!-- Fin col -->
<!-- FIN Contentbar -->
@endsection
@section('script')
<!-- Range Slider js -->
<script src="{{ asset('assets/plugins/ion-rangeSlider/ion.rangeSlider.min.js') }}"></script>
<!-- eCommerce Shop Page js -->
<script src="{{ asset('assets/js/custom/custom-montas-page.js') }}"></script>
<script src="{{ asset('assets/plugins/tabledit/jquery.tabledit.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-table-editable.js') }}"></script>
@endsection