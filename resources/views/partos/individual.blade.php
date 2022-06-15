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
                        <h3 class="card-title">Parto</h3>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Código del parto</th>
                                            <td>{{ $monta->partos_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Código de la madre</th>
                                            <td>{{ $monta->partos_madre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Código del hijo</th>
                                            <td>{{ $monta->hijo_id }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Fecha de Nacimiento</th>
                                            <td>{{ $monta->partos_fecha }}</td>
                                        </tr>
                                        <tr>
                                            <th>Complicaciones</th>
                                            <td>{{ $monta->partos_complicaciones }}</td>
                                        </tr>
                                        @if ($monta->partos_complicaciones!="NO")
                                        <tr>
                                            <th>Descripcion de la complicación</th>
                                            <td>{{ $monta->partos_descrición }}</td>
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