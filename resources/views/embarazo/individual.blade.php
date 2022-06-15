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
                        <h3 class="card-title">Gestación</h3>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Código de gestación</th>
                                            <td>{{ $monta->embarazos_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Código de la madre</th>
                                            <td>{{ $monta->animal_madre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Código del padre</th>
                                            <td>{{ $monta->animal_padre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de embarazo</th>
                                            <td>{{ $monta->embarazos_fecha }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha aproximada de parto</th>
                                            <td>{{ $monta->fecha_aproximada->toDateString() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Embarazo activo</th>
                                            @if ($monta->embarazo_activo==true)
                                           <td> Si</td>
                                            @else
                                            <td>No</td>
                                            @endif

                                        </tr>

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