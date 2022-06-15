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
                        <h3 class="card-title">Muertes</h3>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Código del animal</th>
                                            <td>{{ $muerte->animal_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Nacimiento</th>
                                            <td>{{ $muerte->animal_nacimiento }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de muerte</th>
                                            <td>{{ $muerte->registro_muertes_fecha }}</td>
                                        </tr>
                                        <tr>
                                            <th>Edad</th>
                                            <td>{{ $edad }}</td>
                                        </tr>
                                        <tr>
                                            <th>Causa de muerte</th>
                                            <td>{{ $muerte->registro_muertes_causa}}</td>
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