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

               <h2>Listado de Unidades Academicas</h2><br/>
              
                <button class="btn btn-primary btn-lg rounded" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus fa-1x"></i>&nbsp;&nbsp;Agregar Unidad Academica
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">

                        {!!Form::open(array('url'=>'unidadacademica','method'=>'GET','autocomplete'=>'off'))!!} 
                                <div class="input-group">
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                    </div>
                </div>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr class="bg-primary">
                           
                            <th >Unidad</th>
                            <th>Facultad</th>
                            {{-- <th>Estado</th> --}}
                            <th class="text-center">Editar</th>
                            <th  class="text-center m-auto">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($unidades as $unidad)
                        
                        <tr>
                            
                            <td>{{$unidad->nombre}}</td>
                            <td>{{$unidad->facultad}}</td>
                            {{-- <td>
                                <button type="button" class="btn btn-success btn-md">
                            
                                  <i class="fa fa-check fa-0.5x"></i> Activo
                                </button>
                               
                            </td> --}}

                            <td class="text-center">
                                {{-- <button href="#updateUser{{ $unidad->id }}" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button> --}}
                                <button data-target="#abrirmodaleditar{{ $unidad->id }}" data-toggle="modal" class="btn btn-outline-success btn-circle"><i class="fa fa-pen"></i>
                                </button>
                            {{-- <form action="{{route('unidadacademica.update',$unidad->id)}}" method="post">
                                <button type="button" class="btn btn-primary btn-sm" 
                                data-toggle="modal"
                                data-id_unidad="{{$unidad->id}}" 
                                data-nombre="{{$unidad->nombre}}" 
                                data-facultad="{{$unidad->facultad}}" 
                                data-target="#abrirmodaleditar">
                                  <i class="fa fa-edit fa-0.5x"></i> Editar
                                </button>
                            </form> --}}
                            </td>

                            <td class="text-center">
                                     <form action="{{route('unidadacademica.destroy',$unidad->id)}}" method="post">
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
        <div class="modal fade" id="abrirmodaleditar{{ $unidad->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
        <!--Fin del modal-->
                
                        @endforeach
                    </tbody>
                </table>
                
                
                      {{$unidades->render("pagination::bootstrap-4")}}
                   
                
            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
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
                        
                      @if(!$unidades)
                      <form action="{{route('unidadacademica.update',$unidad->id)}}" method="post" class="form-horizontal">
                        {{method_field('PUT')}}   
                        {{csrf_field()}}
                        <input type="hidden" id="id_unidad" nombre="id_unidad" value="">
                            @include('UnidadAcademica.editform')
    
                        </form>
                      @endif

                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!--Fin del modal-->
    </main>
@endsection