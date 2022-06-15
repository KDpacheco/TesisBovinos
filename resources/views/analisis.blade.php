@section('title') 
SRB - Analisis
@endsection 
@extends('layouts.main')
@section('style')
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />

@endsection 
@section('rightbar-content')

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Analisis de Datos</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                  
                    <li class="breadcrumb-item"><a href="#">SRB</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Analisis</li>
                </ol>
            </div>
        </div>
        <!-- Start col -->
        <div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Grafico #1</h5>
                </div>
                <div class="card-body">
                    <div id="apex-radial-chart"></div>
                </div>
            </div>
        </div>
      <!-- IGRESAR TABLA -->  
    </div>     
    <!-- Start col -->
<div class="col-lg-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Grafico #2</h5>
                </div>
                <div class="card-body">
                    <div id="apex-area-chart"></div>
                </div>
            </div>
        </div>
        <!-- End col -->     
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        
         <!-- Start col -->
        <div class="col-lg-12">
            <div class="card crm-project-box m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 col-xl-1">
                            <p class="piety-data-attributes text-center my-3">
                                <span data-peity='{ "fill": ["#506fe4", "#f2f3f7"],  "innerRadius": 22, "radius": 28 }'>3/7</span>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <h5>Hotel Booking System</h5>
                            <p class="font-14">Created on : 15-Feb-20 | Assign to : Wilson Garcia</p>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-1 pr-0">
                            <h5>598</h5>
                            <p class="font-14">Work Hours</p>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-1 pr-0">
                            <h5>12</h5>
                            <p class="font-14">Board People</p>
                        </div>
                        <div class="col-12 col-lg-12 col-xl-6">
                            <div class="progress" style="height: 22px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Design (25%)</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Development (50%)</div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Testing (25%)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card crm-project-box m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 col-xl-1">
                            <p class="piety-data-attributes text-center my-3">
                                <span data-peity='{ "fill": ["#506fe4", "#f2f3f7"],  "innerRadius": 22, "radius": 28 }'>4/7</span>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <h5>Employee CRM System</h5>
                            <p class="font-14">Created on : 10-Feb-20 | Assign to : Mark Wood</p>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-1 pr-0">
                            <h5>730</h5>
                            <p class="font-14">Work Hours</p>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-1 pr-0">
                            <h5>15</h5>
                            <p class="font-14">Board People</p>
                        </div>
                        <div class="col-12 col-lg-12 col-xl-6">
                            <div class="progress" style="height: 22px;">
                                <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Design (30%)</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Development (40%)</div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">Testing (30%)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card crm-project-box m-b-30">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 col-xl-1">
                            <p class="piety-data-attributes text-center my-3">
                                <span data-peity='{ "fill": ["#506fe4", "#f2f3f7"],  "innerRadius": 22, "radius": 28 }'>5/7</span>
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <h5>Accounting System</h5>
                            <p class="font-14">Created on : 05-Feb-20 | Assign to : Rowe Kushder</p>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-1 pr-0">
                            <h5>980</h5>
                            <p class="font-14">Work Hours</p>
                        </div>
                        <div class="col-6 col-lg-6 col-xl-1 pr-0">
                            <h5>20</h5>
                            <p class="font-14">Board People</p>
                        </div>
                        <div class="col-12 col-lg-12 col-xl-6">
                            <div class="progress" style="height: 22px;">
                                <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Design (40%)</div>
                                <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">Development (40%)</div>
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">Testing (20%)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
         <!-- Fin col -->
    </div>
    <!-- fin row -->
</div>

<!-- FIN Contentbar -->

@endsection 
@section('script')
<!-- Piety Chart js -->
<script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
<!-- Custom CRM Project js --> 
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-chart-apex.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-crm-projects.js') }}"></script>

@endsection 