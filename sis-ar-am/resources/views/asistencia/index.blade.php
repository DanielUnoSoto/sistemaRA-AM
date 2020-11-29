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

                       <h2>Listados de Asistencias</h2><br/>
                       
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
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="bg-primary">
                                    
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Grupo</th>
                                    <th>Cod Materia</th>
                                    <th>Materia</th>
                                    <th>Contenido</th>
                                    <th>Platafoma</th>
                                    <th>Observaciones</th> 
                                    <th>Link clases</th>
                                    <th>Carrera</th>
                                    <th>Facultad</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>

                              {{-- @foreach($asistencias as $asistencia)
                               
                                <tr>
                                  

                                    <td>{{$asistencia->}}</td>
                                    <td>{{$asistencia->}}</td>
                                    <td>{{$asistencia->}}</td>
                                    <td>{{$asistencia->}}</td>
                                    <td>{{$asistencia->}}</td>
                                    <td>${{$asistencia->}}</td>
                                    <td>{{$asistencia->}}</td>
                                    <td>
                                      

                                       
                                    </td>
                                </tr>

                                @endforeach --}}
                               
                            </tbody>
                        </table>

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
                                        
                                            @foreach($materias as $materia)
                                            
                                        <option value="{{$materia->id}}">{{$materia->id}} {{$materia->nombre}} {{$materia->dia}} {{$materia->hora}}</option>
                                                    
                                            @endforeach
                        
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
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Canselar</button>
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