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
        
        
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start col -->
<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-header">
            <h3 class="card-title">Montas o Inseminaciones</h3>
        </div>
        <div class="card-body">
            <div class="row input-daterange">
                <div class="col-md-2">
                    <label>Filtrar por fecha de monta o inseminación</label>
                </div>
                <div class="col-md-2">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Desde"
                        readonly />
                </div>
                <div class="col-md-2">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="Hasta" readonly />
                </div>
                <div class="col-md-2">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filtrar</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Limpiar</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="edit-btn">

                    <tfoot>
                        <th>No</th>
                        <th>Código Madre</th>
                        <th>Código Padre</th>
                        <th>Fecha de Monta</th>
                        <th>Monta exitosa</th>
                        <th class="inv">finalizar</th>
                        <th class="inv">opciones</th>
                    </tfoot>
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Código Madre</th>
                            <th data-priority="3">Código Padre</th>
                            <th data-priority="4">Fecha de Monta</th>
                            <th data-priority="5">Monta exitosa</th>
                            <th data-priority="6" class="noVis">Finalizar</th>
                            <th data-priority="1" class="noVis">Opciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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

<script>
$(document).ready(function () {
    $('#edit-btn tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="buscar" />');
    });
    $('.input-daterange').datepicker({
        language: 'es',
        changeYear: true,
        todayBtn:'linked',
        format:'yyyy-mm-dd',
        autoclose:true
    });


    load_data();
    function load_data(from_date = '', to_date = ''){

        $('#edit-btn').DataTable( {
        
            initComplete: function () {
                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;

                        $('input', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            language: {url: '{{asset('assets/es-Es.json')  }}'},
        
            destroy: true,
            serverSide: true,
            responsive:true,
            pageLength: 5,
            autoWidth:false,
            
            dom: "<'row'<'col-sm-6'><'col-sm-6 right-col'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'l><'col-sm-6'p>><'row'<'col-sm-12 text-right'i>>",
            ajax: {url:'{{ route('monta.index') }}',data:{from_date:from_date, to_date:to_date} } ,
            columns: [
                {data: 'monta_id'},
                {data: 'monta_madre'},
                {data: 'monta_padre'},
                {data: 'monta_fecha'},
                {data: 'exito'},
                {data: 'fin'},
                {data: 'pdf'}
            ],
            buttons: [   
                {
                    extend: 'excelHtml5',
                    text:  ' excel  <i class="mdi mdi-file-excel"></i> ',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: function(idx, data, node) {
                            if ($(node).hasClass('noVis')) {
                                return false;
                            }           
                            return $('#edit-btn').DataTable().column(idx).visible();
                        }
                    }
                },
                {
                    extend: 'colvis',
                    columns: [':not(.noVis)'],
                },
                
                {
                    text: ' nuevo registro  <i class="fa fa-plus"></i> ',
                    className: 'btn btn-info',
                    action: function (e,dt, node, config) {
                        window.location= 'monta/create';
                    } 
                }
            ]
            
        });
    }
    
    $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != ''){
            $('#edit_btn').DataTable().destroy();
            load_data(from_date, to_date);
        }
        else{
            alert('Both Date is required');
        }
    });

    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#edit_btn').DataTable().destroy();
        load_data();
    });
});
</script>
@endsection