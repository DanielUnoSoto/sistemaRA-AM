@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="">Sistema control de Asistencia</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                @if(Auth::user()->rol == 2)
                    @include('asistencia.asistenciaAdmin')
                @elseif(Auth::user()->rol == 3||Auth::user()->rol == 4)
                    @include('asistencia.asistencias')
                @else
                    @include('asistencia.asistenciasAux')
                @endif
              
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
                                        
                                            @if(Auth::user()->rol != 2 && Auth::user()->rol != 5)
                                                     @foreach($materias as $materia)
                                            
                                                <option value="{{$materia->id}}">{{$materia->materiaid}} {{$materia->nombre}} {{$materia->dia}} {{$materia->hora}}</option>
                                                
                                                @endforeach
                                            @endif
                        
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