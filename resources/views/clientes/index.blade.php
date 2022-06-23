@section('title')
SRB - Clientes
@endsection
@extends('layouts.main')
@section('style')

@endsection
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Clientes</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>

                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary-rgba" data-toggle="modal"
                    data-target="#exampleModalCenter"><i class="feather icon-plus mr-2"></i>Agregar Cliente</button>
                <!-- Modal -->

                <div class="modal fade text-left" id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            {!! Form::open(array('url'=>'clientes','method'=>'POST','autocomplete'=>'off')) !!}
                            {{ Form::token() }}
                            <div class="modal-body">
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
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="doctorid">Cedula</label>
                                        <input type="text" class="form-control" name="cedula" value="{{ old('cedula') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="doctorname">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="doctordegree">teléfono (opcional)</label>
                                        <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="feather icon-plus mr-2"></i>Añadir</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">

    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        @foreach($clientes as $cliente)
        <div class="col-lg-6 col-xl-3">
            <div class="card doctor-box m-b-30">
                <div class="card-body text-center">
                    <img src="assets/images/users/boy.svg" class="img-fluid" alt="doctor">
                    <h5>{{$cliente->nombre}}</h5>
                    <div class="doctor-detail">
                        <p class="mb-1">{{ $cliente->cedula }}</p>
                        <p>{{ $cliente->teléfono }}</p>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="col-6 border-right">
                            <h4><i class="ti-pencil"></i></h4>
                            <button type="button" class="btn btn-primary-rgba" data-toggle="modal"
                    data-target="#exampleModalCenter2-{{ $cliente->cedula }}">Editar</button>
                    
                        </div>
                        <div class="col-6">
                            <h4><i class="ti-trash"></i></h4>
                            <p class="my-2">Eliminar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('clientes.modal')
        @endforeach
        <!-- End col -->
        <!-- Start col -->

        <!-- End col -->
    </div>
    <!-- fin row -->
</div>
<!-- FIN Contentbar -->
@endsection
@section('script')
<script>
    @if (count($errors) > 0)
    $('#exampleModalCenter').modal('show');
    @endif
</script>
@endsection