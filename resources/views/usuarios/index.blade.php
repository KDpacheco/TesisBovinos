@section('title')
SRB - Usuarios
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
            <h5 class="card-title">Usuarios</h5>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="edit-btn">
                    <tfoot>
                        <th>Id</th>
                        <th>Nombre </th>
                        <th>Correo</th>
                        <th class="inv"> Opciones</th>
                    </tfoot>
                    <thead>
                        <tr>
                            <th data-priority="1">Id</th>
                            <th data-priority="2">Nombre </th>
                            <th data-priority="3">Correo</th>
                            <th data-priority="1" class="noVis"> Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                    </tbody>
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
        
    
        function newexportaction(e, dt, button, config) {
    var self = this;
    var oldStart = dt.settings()[0]._iDisplayStart;
    dt.one('preXhr', function (e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function (e, settings) {
            // Call the original action function
            if (button[0].className.indexOf('buttons-copy') >= 0) {
                $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                    $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                    $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
            } else if (button[0].className.indexOf('buttons-print') >= 0) {
                $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
            }
            dt.one('preXhr', function (e, s, data) {
                // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                // Set the property to what it was before exporting.
                settings._iDisplayStart = oldStart;
                data.start = oldStart;
            });
            // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
            setTimeout(dt.ajax.reload, 0);
            // Prevent rendering of the full data to the DOM
            return false;
        });
    });
    // Requery the server with the new one-time export settings
    dt.ajax.reload();
};

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
                dom: "<'row'<'col-sm-6'l><'col-sm-6 right-col'B>><'row'<'col-sm-12'tr>><'row'<'col-sm-6'><'col-sm-6'p>><'row'<'col-sm-12 text-right'i>>",
                ajax: '{{ route('usuarios.index') }}',
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'pdf'}
                ],
                buttons: [
                    {
                        extend: 'colvis',
                        columns: [':not(.noVis)'],
                    },
                    {
                        extend: 'excelHtml5',
                        text:  ' excel  <i class="mdi mdi-file-excel"></i> ',
                        className: 'btn btn-success',
                        action: newexportaction,
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
                        text: ' nuevo registro  <i class="fa fa-plus"></i> ',
                        className: 'btn btn-info',
                        action: function (e,dt, node, config) {
                            window.location= 'usuarios/create';
                        } 
                    }
                    
                ]
            
            });
        
    });
    </script>
@endsection