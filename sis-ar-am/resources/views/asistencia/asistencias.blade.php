{{-- @extends('principal')
@section('contenido')
<main class="main"> --}}
            <!-- Breadcrumb -->
            {{-- <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Sistema control de Asistencia</a></li>
            </ol> --}}
            {{-- <div class="container-fluid"> --}}
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                       <h2>Listados de Asistencias </h2><br/>
                       
                       {{-- <a href="{{route('asistencias.create')}}"> --}}
                    

                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                            <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Registrar Asistencia
                        </button>

                        {{-- </a> --}}
                       {{-- <a href="{{route('asistencias')}}">
                    

                        <button class="btn btn-dark btn-lg" type="button">
                            <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Editar Asistencia
                        </button>

                        </a> --}}
                       
                    </div>
                    <div class="card-body">

                        {{-- <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>'asistencias','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
                                <div class="input-group">
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr class="bg-primary ">
                                        
                                        <th>Fecha&nbsp;Registro</th>
                                        <th>Hora</th>
                                        <th>Dia</th>
                                        <th>Grupo</th>
                                        <th>idM</th>
                                        <th>Materia</th>
                                        <th>Clase</th>
                                        <th>Fecha&nbsp;Clase</th>
                                        <th>Feha&nbsp;Repocision</th>
                                        <th  WIDTH="200">Contenido</th>
                                        <th>Platafoma</th>
                                        <th>Observaciones</th> 
                                        <th WIDTH="10">Link</th>
                                        <th>Carrera</th>
                                        <th>Facultad</th>
                                        <th WIDTH="55">Herramientas</th>
                                        <th>Archivo</th>
                                        {{-- "google doc<br>google meet" --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($asistencias as $asistencia)
                                
                                    <tr>
                                        <td class="align-middle">{{$asistencia->created_at}}</td>
                                        <td class="align-middle">{{$asistencia->hora}}</td>
                                        <td class="align-middle">{{$asistencia->dia}}</td>
                                        <td class="align-middle">{{$asistencia->grupo}}</td>
                                        <td class="align-middle">{{$asistencia->idmateria}}</td>
                                        <td class="align-middle">{{$asistencia->nombre}}</td>
                                        <td class="align-middle">{{$asistencia->tipoclase}}</td>
                                        <td class="align-middle">{{$asistencia->fecha}}</td>
                                        <td class="align-middle">{{$asistencia->fecharepo}}</td>
                                        <td class="align-middle ">{{$asistencia->contenido}}</td>
                                        <td class="align-middle">{{$asistencia->plataforma}}</td>
                                        <td class="align-middle">{{$asistencia->observacion}}</td>
                                        <td class="align-middle"><a href="{{$asistencia->link}}" title="{{$asistencia->link}}" target="blank"> {!! !empty($asistencia->link) ? '<i class="fas fa-video"></i>' : '' !!}</a></td>
                                        <td class="align-middle">{{$asistencia->unidad}}</td>
                                        <td class="align-middle">{{$asistencia->facultad}}</td>
                                        <td class="align-middle w-10">{!!$asistencia->herramientas!!}</td>
                                        <td class="align-middle"><a target="blank" href="{{asset('/storage/archivos/'.$asistencia->archivos)}}"> {!! !empty($asistencia->archivos) ? '<i class="fas fa-file-alt"></i>' : '' !!}</a></td>
                                        
                                    </tr>

                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div> 

                        {{-- {{$asistencia->render()}} --}}
                        
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            {{-- </div> --}}
                       
           
  