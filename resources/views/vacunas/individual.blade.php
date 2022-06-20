<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <link rel="stylesheet" href="{{ public_path('assets/css/report.css')}}" type="text/css" />

</head>

<body>
    <div class="content-wrapper">

        <section class="content-header">
            <h1 style='text-align:center; vertical-align:middle'>Informe General</h1>
        </section>

        <section class="content container-fluid">
            <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <h3 class="card-title">Vacunación</h3>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Código de vacunación</th>
                                            <td>{{ $monta->registro_vacunas_id}}</td>
                                        </tr>
                                        <tr>
                                            <th>Código del animal</th>
                                            <td>{{ $monta->animal_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Vacuna</th>
                                            <td>{{ $monta->vacuna_nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de vacunación</th>
                                            <td>{{ $monta->registro_vacunas_fecha }}</td>
                                        </tr>
                                        @if ($monta->registro_vacunas_proxima==null)
                                        <tr>
                                            <th>Fecha de proxima vacunación</th>
                                            <td>Dosis Única</td>
                                        </tr>                 
                                        @else
                                        <tr>
                                            <th>Fecha de proxima vacunación</th>
                                            <td>{{ $monta->registro_vacunas_proxima }}</td>
                                        </tr>                           
                                        @endif
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
</body>

</html>