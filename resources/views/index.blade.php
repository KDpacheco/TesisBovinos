@section('title') 
SRB - Inicio
@endsection 
@extends('layouts.main')
@section('style')
<!-- Importaciones css -->
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/fullcalendar/css/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')

<!-- Inicio  MENU -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">SRB</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">SRB</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <!-- AGG WILSON -->                     
        </div>
    </div>          
</div>
<!-- FIN MENU -->
<!-- Inicio Contentbar -->    
<div class="contentbar">                
    <!-- Inicio row -->
    <div class="row">
        <!-- Inicio col -->
        <div class="col-lg-12 col-xl-9">
            <!-- Inicio row -->
            <div class="row">
                 <!-- Inicio col -->
                 <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4>13<i class="feather icon-arrow-down text-danger ml-1"></i><img src="assets/images/bovinos/animales.png " width="50" height="50"></h4>
                                    <p class="font-14 mb-0">Animales</p>
                                </div>
                                <div class="col-5">
                                    <div id="apex-area2-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin col -->
                 
             
                <!-- Inicio col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4>13<i class="feather icon-arrow-down text-danger ml-1"></i><img src="assets/images/bovinos/partos.png " width="50" height="50"></h4>
                                    <p class="font-14 mb-0">Partos</p>
                                </div>
                                <div class="col-5">
                                    <div id="apex-area2-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin col -->
                <!-- Inicio col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4>4<i class="feather icon-arrow-up text-success ml-1"></i><img src="assets/images/bovinos/abortos.png " width="50" height="50"></h4>
                                    <p class="font-14 mb-0">Abortos</p>
                                </div>
                                <div class="col-5">
                                    <div id="apex-area3-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin col -->
                <!-- Inicio col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4>4<i class="feather icon-arrow-up text-success ml-1"></i><img src="assets/images/bovinos/enfermedades.png " width="50" height="50"></h4>
                                    <p class="font-14 mb-0">Enfermedades</p>
                                </div>
                                <div class="col-5">
                                    <div id="apex-area3-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin col -->
                <!-- Inicio col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4>4<i class="feather icon-arrow-up text-success ml-1"></i><img src="assets/images/bovinos/vita.png " width="50" height="50"></h4>
                                    <p class="font-14 mb-0">vitaminas</p>
                                </div>
                                <div class="col-5">
                                    <div id="apex-area3-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin col -->
<!-- Inicio col -->
<div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h4>13<i class="feather icon-arrow-down text-danger ml-1"></i><img src="assets/images/bovinos/animales.png " width="50" height="50"></h4>
                                    <p class="font-14 mb-0">Animales</p>
                                </div>
                                <div class="col-5">
                                    <div id="apex-area2-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin col -->
                <!-- Inicio col -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Calendario</h5>
                                </div>
                                <div class="col-3">
                                    <div class="dropdown">
                                        <button class="btn btn-link p-0 font-18 float-right" type="button" id="ticketStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ticketStatus">
                                            <a class="dropdown-item font-13" href="#">Actualizar</a>
                                            <a class="dropdown-item font-13" href="#">Export</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body crm-tab-widget">
                            <div class="row align-items-center">
                            <div class="contentbar">
    <!-- Inicio row -->
    <div class="row">
        <!-- Inicio col -->
        <div class="col-14">                                 
            <div class="row">
                 <div class="col-md-8 col-lg-9 col-xl-10">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 col-xl-2">
                    <div class="card m-b-30">
                        
                        <div class="card-body">
                            
                            

                        </div>
                    </div>
                    <!-- fin row -->
                </div>
            </div>
        </div> <!-- Fin col -->
    </div> <!-- fin row -->
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
        <!-- Fin col -->
         <!-- Inicio col -->
         <!-- Inicio col -->
        <div class="col-lg-12 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">                                
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0">Próximas tareas</h5>
                        </div>
                        <div class="col-3">
                            <div class="dropdown">
                                
                                <button class="btn btn-link p-0 font-18 float-right" type="button" id="upcomingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                    
                                    <a class="dropdown-item font-13" href="#">Actualizar</a>
                                    <a class="dropdown-item font-13" href="#">Export</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">                                        
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"></label>
                                               <h7 class="card-title mb-0">Tarea #1 trabajar con los bovinos</h7>
                                       
                                       
                                        </div>
                                        
                                    </td>
                                    
                                    <td>
                                        <button type="button" class="float-right btn btn-primary-rgba font-14">Hecho</button>
                                    </td>
                                   
                                </tr>
                                
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                            <h7 class="card-title mb-0">Tarea #2 trabajar con los bovinos</h7>

                                       
                                        </div>
                                    </td>
                                    
                                   
                                   
                                </tr>   
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                            <h7 class="card-title mb-0">Tarea #3 trabajar con los bovinos</h7>

                                        </div>
                                    </td>
                                    
                                   
                                   
                                </tr> 
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                            <h7 class="card-title mb-0">Tarea #4 trabajar con los bovinos</h7>

                                        </div>
                                    </td>
                                    
                                   
                                </tr> 
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                        </div>
                                    </td>
                                    
                                    
                                   
                                </tr> 
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                        </div>
                                    </td>
                                   
                                   
                                </tr> 
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                        </div>
                                    </td>
                                    
                                   
                                   
                                </tr> 
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox mt-3 mr-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"></label>
                                        </div>
                                    </td>
                                    
                                    
                                   
                                </tr> 
                                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin col -->
     
    <!-- fin row -->
  
</div>
<!-- FIN Contentbar -->
@endsection 
@section('script')
<!-- Apex js -->
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- jVector Maps js -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
<!-- Custom Dashboard js -->  
<script src="{{ asset('assets/js/custom/custom-dashboard.js') }}"></script>

<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>  
<script src="{{ asset('assets/plugins/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-calender.js') }}"></script>
@endsection 