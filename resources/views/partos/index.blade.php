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
        </div>
        <div class="card-body">
            <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="edit-btn">
                    <thead>

                        <tr>
                            <th>Código</th>
                            <th>Código Madre</th>
                            <th>Código Hijo</th>
                            <th>Fecha de Parto</th>
                            <th>Complicaciones</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <
                </table>
            
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
<script>
    $(document).ready(function () {
    $('#edit-btn').DataTable( {
        responsive: true,
        autoWidth:false,
        dom: 'Bfrtip',
        ajax: '{{ route('datatable.partos') }}',
        columns: [
        {data: 'partos_id'},
        {data: 'partos_madre'},
        {data: 'hijo_id'},
        {data: 'partos_fecha'},
        {data: 'partos_complicaciones'},
        {data: 'partos_descripción'},
        {data: 'pdf'},
        
    ],
        buttons: [
            {
                extend: 'excelHtml5',
                text:  ' excel  <i class="mdi mdi-file-excel"></i> ',
                className: 'btn btn-success',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }
            
        ]
        
    });
});
</script>
@endsection