@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="/">SISTEMA DE CONTROL</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">

               <h2>Listado de Materias</h2><br/>
              
                <button class="btn btn-primary btn-lg rounded" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Registrar Materia
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">

                        {{-- {!!Form::open(array('url'=>'unidadacademica','method'=>'GET','autocomplete'=>'off'))!!} 
                                <div class="input-group">
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}} --}}
                    </div>
                </div>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                           
                            <th>ID</th>
                            <th>Materia</th>
                            <th>Grupo</th>
                            <th>Unidad</th>
                            <th>Horarios</th>
                            <th>Editar</th>
                            {{-- <th>Estado</th> --}}
                            {{-- <th class="text-center">Editar</th> --}}
                            <th  class="text-center m-auto">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($materias as $materia)
                        
                        <tr>
                            
                            <td>{{$materia->id}}</td>
                            <td>{{$materia->materia}}</td>
                            <td>{{$materia->grupo}}</td>
                            <td>{{$materia->unidad}}</td>
                            <td><a href="{{route('horarios.show',$materia->id)}}"><button class="btn btn-outline-success btn-circle"><i class="fa fa-clock"></i></button></a></td>
                            {{-- <td><a ></a><button class="btn btn-outline-success btn-circle"><i class="far fa-clock"></i></button></a></td> --}}
                            {{-- <td>
                                <button type="button" class="btn btn-success btn-md">
                            
                                  <i class="fa fa-check fa-0.5x"></i> Activo
                                </button>
                               
                            </td> --}}

                            {{-- <td class="text-center"> --}}
                                {{-- <button href="#updateUser{{ $unidad->id }}" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> --}}
                                {{-- <button data-target="#abrirmodaleditar{{ $unidad->id }}" data-toggle="modal" class="btn btn-outline-success btn-circle"><i class="fa fa-pen"></i>
                                </button> --}}
                            <td>
                            <form action="{{route('materias.update',$materia->id)}}" method="post">
                                <button type="button" class="btn btn-outline-primary btn-circle" data-toggle="modal" 
                                data-id_unidad="{{$materia->id}}" 
                                    data-nombre="{{$materia->materia}}" 
                                data-facultad="{{$materia->grupo}}" 
                                data-target="#abrirmodaleditar">
                                  <i class="fa fa-pen"></i>
                                </button>
                            </form>
                            </td>

                            <td class="text-center">
                                     <form action="{{route('materias.destroy',$materia->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-outline-danger btn-circle"><i class="fa fa-trash"></i></button>
                                    </form>
                            </td>
                        </tr>

                        {{-- <div class="modal fade" id="update1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-content">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input value="{{ $unidad->nombre }}" title="Solo puede ingresar letras en este campo." id="Primer nombre" type="text" class="validate" required>
                                        <label for="Primer nombre">Primer nombre:</label>
                                    </div>
                
                                    <div class="input-field col s10 m6 push-s1">
                                        <input value="{{ $unidad->id }}" title="Solo puede ingresar letras en este campo." id="Segundo nombre" type="text" class="validate" required>
                                        <label for="Segundo nombre">Segundo nombre:</label>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                                <!--Inicio del modal actualizar-->
        <div class="modal fade" id="abrirmodaleditar{{ $materia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Actualizar  Materia</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                   
                    <div class="modal-body">
                        
                        <form action="{{route('materias.update',$materia->id)}}" method="post" class="form-horizontal">
                            {{method_field('PUT')}}   
                            {{csrf_field()}}
                            <input type="hidden" id="id_unidad" nombre="id_unidad" value="">
                                @include('materia.editform')
    
                        </form>
                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->
                
                        @endforeach
                    </tbody>
                </table>
                
                
                      {{-- {{$materias->render("pagination::bootstrap-4")}} --}}
                   
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar Materia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    
                <form action="{{route('materias.store')}}" method="post" class="form-horizontal">
                       {{csrf_field()}}
                        @include('materia.form')

                    </form>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->

        <!--Inicio del modal actualizar-->
      
        <!--Fin del modal-->
    </main>
@endsection