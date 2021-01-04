@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/">Sistema de control de asistencia</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">

                       <h2>Listado de Docentes - Materias</h2><br/>
                      
                        <button class="btn btn-primary btn-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                            <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Asignar Materias
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                            {!!Form::open(array('url'=>'clases','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!} 
                                  <div class="input-group"> 
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                             {{Form::close()}} 
                            </div>
                        </div> 
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr class="bg-primary">
                                   
                                    <th>Rol</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    {{-- <th>CI</th> --}}
                                    {{-- <th>Tipo Usuario</th> --}}
                                    {{-- <th>Email</th> --}}
                                    {{-- <th>Usuario</th> --}}
                                    <th>Materia</th>
                                    <th>Grupo</th>
                                    <th>Carrera</th>
                                    <th>Facultad</th>
                                    <th>Eliminar</th>
                                    {{-- <th>Cambiar Estado</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                               @foreach($clases as $clase)
                               
                                <tr>
                                    
                                    <td>{{$clase->rol}}</td>
                                    <td>{{$clase->nombre}}</td>
                                    <td>{{$clase->apellido}}</td>
                                    {{-- <td>{{$user->ci}}</td> --}}
                                    {{-- <td>{{$user->rol}}</td> --}}
                                    {{-- <td>{{$user->telefono}}</td> --}}
                                    <td>{{$clase->matery}}</td>
                                    <td>{{$clase->grupo}}</td>
                                    <td>{{$clase->unidad}}</td>
                                    <td>{{$clase->facultad}}</td>
                            
                                 

                                    {{-- <td>
                                      
                                      @if($user->condicion=="1")
                                        <button type="button" class="btn btn-success btn-md">
                                    
                                          <i class="fa fa-check fa-2x"></i> Activo
                                        </button>

                                      @else

                                        <button type="button" class="btn btn-danger btn-md">
                                    
                                          <i class="fa fa-check fa-2x"></i> Desactivado
                                        </button>

                                       @endif
                                       
                                    </td> --}}
                            
                                    <td class="text-center">
                                        <form action="{{route('clases.destroy',$clase->id)}}" method="post">
                                           {{csrf_field()}}
                                           {{method_field('delete')}}
                                           <button type="submit" class="btn btn-outline-danger btn-circle"><i class="fa fa-trash"></i></button>
                                       </form>
                                        </td>

                                    
                                    {{-- <td>

                                       @if($user->condicion)

                                        <button type="button" class="btn btn-danger btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-times fa-2x"></i> Desactivar
                                        </button>

                                        @else

                                         <button type="button" class="btn btn-success btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                            <i class="fa fa-lock fa-2x"></i> Activar
                                        </button>

                                        @endif
                                       
                                    </td> --}}

                                    
                                </tr>

                                @endforeach
                               
                            </tbody>
                        </table>
                            
                        {{$clases->render("pagination::bootstrap-4")}} 

                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
            <!--Inicio del modal agregar-->
            <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Asignar Materia</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('clases.store')}}" method="post" class="form-horizontal" >
                               
                                {{csrf_field()}}
                                
                                @include('Clase.form')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->


             <!--Inicio del modal actualizar-->
             <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Actualizar usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                       
                        <div class="modal-body">
                             

                            <form action="{{route('user.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                                
                                {{method_field('patch')}}
                                {{csrf_field()}}

                                <input type="hidden" id="id_usuario" name="id_usuario" value="">
                                
                                @include('Clase.form')

                            </form>
                        </div>
                        
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->

            
             {{-- <!-- Inicio del modal Cambiar Estado del usuario -->
             <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cambiar Estado del Usuario</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>

                    <div class="modal-body">
                        <form action="{{route('user.destroy','test')}}" method="POST">
                         {{method_field('delete')}}
                         {{csrf_field()}} 

                            <input type="hidden" id="id_usuario" name="id_usuario" value="">

                                <p>Estas seguro de cambiar el estado?</p>
        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                            </div>

                         </form>
                    </div>
                    <!-- /.modal-content -->
                   </div>
                <!-- /.modal-dialog -->
             </div>
            <!-- Fin del modal Eliminar --> --}}
           

           
            
        </main>

@endsection