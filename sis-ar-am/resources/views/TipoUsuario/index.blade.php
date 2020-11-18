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

               <h2>Listado de Tipos de usuario</h2><br/>
              
                {{-- <button class="btn btn-primary btn-lg rounded" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Agregar Unidad Academica
                </button> --}}
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control col-md-3">
                                <option value="nombre">Unidad</option>
                                <option value="descripcion">Facultad</option>
                            </select>
                            <input type="text" class="form-control" placeholder="Buscar texto">
                            <button type="submit"  class="btn btn-primary rounded"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                           
                            {{-- <th>Unidad</th>
                            <th>Facultad</th> --}}
                            <th>Tipos de usuarios</th>
                            {{-- <th>Editar</th>
                            <th>Eliminar</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($tipos as $key => $tipo)
                        
                        <tr>
                            
                            <td>{{$tipo->tipoUsuario}}</td>
                            {{-- <td>{{$unidad->facultad}}</td> --}}
                            {{-- <td>
                                <button type="button" class="btn btn-success btn-md">
                            
                                  <i class="fa fa-check fa-0.5x"></i> Activo
                                </button>
                               
                            </td> --}}

                            {{-- <td>
                            <form action="{{route('unidadacademica.update',$unidad->id)}}" method="post">
                                <button type="button" class="btn btn-primary btn-sm" 
                                data-toggle="modal"
                                data-id_unidad="{{$unidad->id}}" 
                                data-nombre="{{$unidad->nombre}}" 
                                data-facultad="{{$unidad->facultad}}" 
                                data-target="#abrirmodaleditar">
                                  <i class="fa fa-edit fa-0.5x"></i> Editar
                                </button>
                            </form>
                            </td> --}}

                            {{-- <td>
                                     <form action="{{route('unidadacademica.destroy',$unidad->id)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-remove fa-0.5x"></i> Eliminar
                                        </button>
                                    </form>
                            </td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                
                      {{$tipos->render()}}
                   
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    {{-- <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Unidad Academica</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
               
                <div class="modal-body">
                    
                <form action="{{route('unidadacademica.store')}}" method="post" class="form-horizontal">
                       {{csrf_field()}}
                        @include('UnidadAcademica.form')

                    </form>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->

        <!--Inicio del modal actualizar-->
        <div class="modal fade" id="abrirmodaleditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-primary modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Actualizar Unidad Academica</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                    </div>
                   
                    <div class="modal-body">
                        
                    <form action="{{route('unidadacademica.update',$unidad->id)}}" method="post" class="form-horizontal">
                        {{method_field('PUT')}}   
                        {{csrf_field()}}
                        <input type="hidden" id="id_unidad" nombre="id_unidad" value="">
                            @include('UnidadAcademica.editform')
    
                        </form>
                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal--> --}}
   
    
</main>

@endsection