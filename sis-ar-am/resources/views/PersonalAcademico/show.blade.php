@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Sistema control de Asistencia</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                    <h2>Asistencias de {{$personal->first()->apellido}} {{$personal->first()->nombre}}</h2><br/>
                       
                       {{-- <a href="{{route('asistencias.create')}}"> --}}
                    

                        {{-- <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                            <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Registrar Asistencia
                        </button> --}}

                        {{-- </a> --}}
                       {{-- <a href="{{route('asistencias')}}">
                    

                        <button class="btn btn-dark btn-lg" type="button">
                            <i class="fa fa-plus fa-2x"></i>&nbsp;&nbsp;Editar Asistencia
                        </button>

                        </a> --}}
                       
                    </div>
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>"personalacademico/$iduser",'method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
                                <div class="input-group">
                                   
                                <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::open(array('url'=>"personalacademico/$iduser",'method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
                            <div class="row">
                            <div class="col-auto">
                                <div class="form-group mx-sm-3 mb-2" >
                                    <label class="form-control-label" for="fechainicio">Fecha inicio</label>
                                <input type="date" id="fechainicio" name="fechainicio" class="form-control" value="{{$fechainicio}}" >
                                  </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    <label class="form-control-label" for="fechafin">Fecha fin</label>
                                <input type="date" id="fechafin" name="fechafin" class="form-control" value="{{$fechafin}}">
                                  </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-group">
                                    {{-- <label class="form-control-label" for="fecha"></label> --}}
                                    <button type="submit" class="btn btn-primary from-control">Filtrar por fecha</button>
                                  </div>
                            </div>
                        </div>
                            {{Form::close()}}
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr class="bg-primary ">
                                        
                                        <th>Fecha Registro</th>
                                        <th>Fecha Clase</th>
                                        <th>Hora</th>
                                        <th>Dia</th>
                                        <th>Grupo</th>
                                        <th>idM</th>
                                        <th>Materia</th>
                                        <th>Clase</th>
                                        <th>Feha de Repocision</th>
                                        <th>Contenido</th>
                                        <th>Platafoma</th>
                                        <th>Observaciones</th> 
                                        <th>Link clases</th>
                                        {{-- <th>Carrera</th>
                                        <th>Facultad</th> --}}
                                        <th scope="2">Herramientas</th>
                                        {{-- "google doc<br>google meet" --}}
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($asistencias as $asistencia)
                                
                                    <tr>
                                        <td class="align-middle">{{$asistencia->created_at}}</td>
                                        <td class="align-middle">{{$asistencia->fecha}}</td>
                                        <td class="align-middle">{{$asistencia->hora}}</td>
                                        <td class="align-middle">{{$asistencia->dia}}</td>
                                        <td class="align-middle">{{$asistencia->grupo}}</td>
                                        <td class="align-middle">{{$asistencia->idmateria}}</td>
                                        <td class="align-middle">{{$asistencia->nombre}}</td>
                                        <td class="align-middle">{{$asistencia->tipoclase}}</td>
                                        <td class="align-middle">{{$asistencia->fecharepo}}</td>
                                        <td class="align-middle">{{$asistencia->contenido}}</td>
                                        <td class="align-middle">{{$asistencia->plataforma}}</td>
                                        <td class="align-middle">{{$asistencia->observacion}}</td>
                                        <td class="align-middle"><a href="{{$asistencia->link}}" target="blank">Video</a></td>
                                        {{-- <td class="align-middle">{{$asistencia->unidad}}</td>
                                        <td class="align-middle">{{$asistencia->facultad}}</td> --}}
                                        <td class="align-middle w-10">{!!$asistencia->herramientas!!}</td>
                                        
                                    </tr>

                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div> 

                        {{-- {{$asistencia->render()}} --}}
                        
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
                       
           
        <!-- Inicio del modal Seleccionar materia -->
            <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Selecionar materia</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('asistencias.create')}}" method="get" class="form-horizontal" enctype="multipart/form-data" >
                                {{csrf_field()}}

                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="materia">Materia</label>
                                    
                                    <div class="col-md-9">
                                    
                                        <select  class="form-control"  name="materia" id="materia">
                                                                        
                                        <option value="0" selected="true">Seleccione</option>
                                        {{-- <option value="0" >Fisica</option>
                                        <option value="0" >Quimica</option> --}}
                                        
                                            {{-- @foreach($materias as $materia)
                                            
                                        <option value="{{$materia->id}}">{{$materia->materiaid}} {{$materia->nombre}} {{$materia->dia}} {{$materia->hora}}</option>
                                                    
                                            @endforeach
                         --}}
                                        </select>
                                    
                                    </div>
                                                               
                            </div>
                        
            
                        
                             {{-- <div class="form-group row">
                                        <label class="col-md-3 form-control-label" for="password">Password</label>
                                        <div class="col-md-9">
                                          
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese el password" required>
                                               
                                        </div>
                            </div> --}}
                        
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-1x"></i> Canselar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save fa-1x"></i> Selecinar</button>
                                
                            </div>

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
             <!-- Fin del modal seleccionar materia -->
            
        </main>
@endsection