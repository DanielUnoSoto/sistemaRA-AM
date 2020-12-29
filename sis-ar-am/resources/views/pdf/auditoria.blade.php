<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Auditoria</title>
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            /* font-size: 0.875rem; */
            font-size: 12px;
            font-weight: normal;
            line-height: 1.5;
            color: #151b1e;           
        }
        .table {
            display: table;
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        .table-bordered {
            border: 1px solid #c2cfd6;
        }
        thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table th, .table td {
            padding: 0.75rem 0.35rem;
            vertical-align: top;
            border-top: 1px solid #c2cfd6;
        }
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #c2cfd6;
        }
        .table-bordered thead th, .table-bordered thead td {
            border-bottom-width: 2px;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #c2cfd6;
        }
        th, td {
            display: table-cell;
            vertical-align: inherit;
        }
        th {
            font-weight: bold;
            text-align: -internal-center;
            /* text-align: left; */
        }
        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .izquierda{
            float:left;
        }
        .derecha{
            float:right;
        }
    </style>
</head>
<body>
    <div>
        <h3>Reporte Auditoria <span class="derecha">{{date('d-M-Y')}}</span></h3>
        <hr>
        <p>UNIVERSIDAD MAYOR DE SAN SIMON <span class="izquierda"></span></p>
        <p>Facultad: {{$asistencias->first()->facultad}}</p>
        <p>Carrera: {{$asistencias->first()->unidad}}</p>
        <p>Nombre:  <span class="izquierda"></span>{{$personal->first()->nombre}} {{$personal->first()->apellido}}</p>
        @if($fechainicio&&$fechafin)
        <p>Fechas: <span class="izquierda"></span> {{$fechainicio}} al {{$fechafin}}</p>
        @endif
        
        
    </div>
    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr> 
                    <th width="50">Fecha Registro</th>
                    <th width="50">Fecha Clase</th>
                    <th width="20" >Hora</th>
                    <th width="10">Dia</th>
                    <th width="20">Grupo</th>
                    <th width="10">id</th>
                    <th width="20">Materia</th>
                    <th WIDTH="30" >Clase</th>


                    
                    @if($contador!=0)
                    <th WIDTH="50" >Feha Reposicion</th>
                    @endif

                    <th WIDTH="300" >Contenido</th>
                    <th WIDTH="40" >Platafoma</th>
                    <th width="60">Observaciones</th> 
                    <th WIDTH="10" >Link clases</th>
                    {{-- <th>Carrera</th>
                    <th>Facultad</th> --}}
                    <th WIDTH="50" >Herramientas</th>
                    {{-- <th>Stock</th> --}}
                    
                </tr>
            </thead>
            <tbody>
                @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{$asistencia->created_at}}</td>
                    <td>{{$asistencia->fecha}}</td>
                    <td>{{$asistencia->hora}}</td>
                    <td>{{$asistencia->dia}}</td>
                    <td>{{$asistencia->grupo}}</td>
                    <td>{{$asistencia->idmateria}}</td>
                    <td>{{$asistencia->nombre}}</td>
                    <td>{{$asistencia->tipoclase}}</td>
                    @if($contador!=0)
                        <td>{{$asistencia->fecharepo}}</td>
                    @endif
                           
                   
                    <td>{{$asistencia->contenido}}</td>
                    <td>{{$asistencia->plataforma}}</td>
                    <td>{{$asistencia->observacion}}</td>
                    <td><a href="{{$asistencia->link}}" target="blank">{!! !empty($asistencia->link) ? 'link' : '' !!}</a></td>
                    {{-- <td class="align-middle">{{$asistencia->unidad}}</td>
                    <td class="align-middle">{{$asistencia->facultad}}</td> --}}
                    <td>{!!$asistencia->herramientas!!}</td>
                   
                </tr>
                @endforeach                               
            </tbody>
        </table>
    </div>
    {{-- <div class="izquierda">
        <p><strong>Total de registros: </strong>{{$cont}}</p>
    </div>     --}}
</body>
</html>