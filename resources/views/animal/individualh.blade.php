<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ public_path('assets/css/report.css')}} " type="text/css" />
</head>

<body>
    <div class="content-wrapper">

        <section class="content-header">
            <h1 style='text-align:center; vertical-align:middle'>INFORME INDIVIDUAL</h1>
        </section>

        <section class="content container-fluid">
            <div class="box box-default">
                <div class="box-header with-border">
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="box-tittle"> Datos del Animal</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Animal Id</th>
                                            <td>{{ $animales->animal_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Padre Id</th>
                                            <td>{{ $animales->animal_padre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Madre Id</th>
                                            <td>{{ $animales->animal_madre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Sexo</th>
                                            <td>{{ $animales->animal_sexo }}</td>
                                        </tr>
                                        <tr>
                                            <th>Categoría</th>
                                            <td>{{ $animales->categoria_nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Color</th>
                                            <td>{{ $animales->animal_color }}</td>
                                        </tr>
                                        <tr>
                                            <th>Peso</th>
                                            <td>{{ $animales->animal_peso }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha de Nacimiento</th>
                                            <td>{{ $animales->animal_nacimiento->toDateString() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Raza</th>
                                            <td>{{ $animales->raza_nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estado del Animal</th>
                                            <td>{{ $animales->estados_nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>Estado Productivo</th>
                                            <td>{{ $animales->produccion_nombre }}</td>
                                        </tr>
                                        <tr>
                                            <th>En Días Abiertos</th>
                                            <td>
                                                @if ($animales->animal_abierto==true)
                                                Si
                                                @else
                                                No
                                                @endif</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="box-tittle"> Datos Reproductivos</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Numero de Montas</th>
                                            <td>
                                                {{ $montast }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Montas exitosas</th>
                                            <td>
                                                {{ $montasexito }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Montas no exitosas</th>
                                            <td>
                                                {{ $montas2 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Resultados en espera</th>
                                            <td>
                                                @if ($animales->animal_estado==5)
                                                Si
                                                @else
                                                No
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Gestaciones exitosas</th>
                                            <td>{{ $gestexito }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gestaciones fallidas</th>
                                            <td>{{ $gestexito2 }}</td>
                                        </tr>
                                        <tr>
                                            <th>Actualmente gestando</th>
                                            <td>
                                                @if ($animales->animal_estado==4)
                                                Si
                                                @else
                                                No
                                                @endif
                                            </td>
                                        </tr>
                                        <tr></tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-show">
                                    <caption style="text-align:center; font-size:120%; color: #0b0b0b;">Lista de
                                        Descendencia</caption>
                                    <thead>
                                        <tr>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                Codigo Hijo
                                            </th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                Fecha de Nacimiento
                                            </th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                Problemas en el parto
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($partos as $p)
                                        <tr>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->hijo_id }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->partos_fecha }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->partos_complicaciones }}
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="box-tittle"> Datos Productivos</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Litros de leche obtenidos</th>
                                            <td>
                                                {{ $litros }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-show">
                                    <caption style="text-align:center; font-size:120%; color: #0b0b0b;">Litros de Leche
                                        por periodo </caption>
                                    <thead>
                                        <tr>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha de
                                                Inicio de ordeño</th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha
                                                Final de ordeño</th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Litros
                                                Obtenidos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($periodo as $p )
                                        <tr>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->inicio }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->final }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->litros }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="box-tittle"> Datos Sanitarios</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-show">
                                    <tbody>
                                        <tr>
                                            <th>Enfermedades Detectadas</th>
                                            <td>
                                                {{ $enfermedadescount }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-show">
                                    <caption style="text-align:center; font-size:120%; color: #0b0b0b;">Listado de
                                        Enfermedades </caption>
                                    <thead>
                                        <tr>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Nombre
                                                de Enfermedad
                                            </th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha de
                                                detección</th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Estado
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($enfermedades as $p )
                                        <tr>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->enfermedad_nombre }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->enfermedad_fecha }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->enfermedad_estado }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-show">
                                    <caption style="text-align:center; font-size:120%; color: #0b0b0b;">Historial de
                                        Vacunación </caption>
                                    <thead>
                                        <tr>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Nombre
                                            </th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha de
                                                vacunación</th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha de
                                                proxima vacunación</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vacunas as $p)
                                        <tr>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->vacuna_nombre }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->registro_vacunas_fecha }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                @if($p->registro_vacunas_proxima==null)
                                                Dosis Única
                                                @else
                                                {{ $p->registro_vacunas_proxima->toDateString() }}
                                                @endif
                                            </td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered table-show">
                                    <caption style="text-align:center; font-size:120%; color: #0b0b0b;">Lista de
                                        Actividades </caption>
                                    <thead>

                                        <tr>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Nombre
                                            </th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha de
                                                ultima realización</th>
                                            <th style="border-width: 1px;border: solid; border-color: #0b0b0b;">Fecha de
                                                próxima realización</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($actividades as $p)
                                        <tr>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->actividades_nombre }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                {{ $p->registro_actividades_fecha }}
                                            </td>
                                            <td style="border-width: 1px;border: solid; border-color: #0b0b0b;">
                                                
                                                @if($p->registro_actividades_proxima==null)
                                                Actividad Única
                                                @else
                                                {{ $p->registro_actividades_proxima->toDateString() }}
                                                @endif
                                            </td>
                                        </tr>    
                                        @endforeach
                                        
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
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