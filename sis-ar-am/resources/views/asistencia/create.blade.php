@extends('principal')
@section('contenido')


<main class="main">
    <ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{route('asistencias.index')}}">Atras</a></li>
    </ol>

  <div class="container-fluid">  
    <div class="card">  
      <div class="card-header">
            <h2>Registrar Asistencia</h2>
      </div>
      <div class="card-body">

        
        {{-- Incluye el formulario de llenado automatico --}}
        @include('asistencia.formAuto')
        
        <form action="{{route('asistencias.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
           {{csrf_field()}}
            {{-- <p hidden id="horaId" name="horaId">{{$herramientas->first()->id}}</p> --}}
            <input hidden type="input" id="horaId" name="horaId" class="form-control" value="{{$horarios->first()->id}}">

            <input hidden type="input" id="usuario" name="usuario" class="form-control" value="{{Auth::user()->id}}">
            
            <div class="container-fluid">
           <div class="row ">
              <div class="col-md-4">
                  <div class="form-group">
                      <label for="contenido">Contenido de la clase:</label>
                          <textarea placeholder="Ingrese el contenido avanzado en la clase" class="form-control" name="contenido" id="contenido"  rows="3"></textarea>
                          
                      
                  </div>

                  <div class="form-group">
                    <label class="form-control-label" for="fecha">Fecha de la clase</label>
                    <input type="date" id="fecha" name="fecha" class="form-control"  required pattern="[0-9]{0,15}">
                  </div>

                  <div class="form-group">
                    <label class="form-control-label" for="tipoclase">Tipo de clase</label>
                    <select  onchange= "yesnoCheck(this)"  class="form-control inputpicker" name="tipoclase" id="tipoclase" data-live-search="true">                              
                      {{-- <option value="0" inputed="true" disabled="disable" >Seleccione</option> --}}
                      <option value="normal" inputed="true">Normal</option>
                      <option id='reposicion' value="reposicion" >Reposicion</option>
                    </select>
                  </div>

                  {{-- <br>
                  <input  onchange= "yesnoCheck(this)" type="radio" name="tipo" value="normal" checked="true">Normal
                  
                  <input  onchange= "yesnoCheck(this)" type="radio" name="tipo" id='reposicion' value="reposicion" >Reposicion --}}

                   <!-- fecha de reposicion -->
                <div class="form-group" id="inputfecha" style="display: none;">
                  <label class="form-control-label" for="fechaReposicion">Fecha de reposicion</label>
                  <input type="date" id="fechaReposicion" name="fechaReposicion" class="form-control" >
                </div>
                <!-- fin del codigo para la fecha de reposicion -->
                  <div class="form-group">
                    <label class="form-control-label" for="nombre">Plataforma</label>
                  
                    <select class="form-control inputpicker" name="plataforma" id="plataforma" data-live-search="true">                              
                      <option value="0" selected="true" disabled="disable" >Seleccione</option>
                      <option value="classroom">Classroom</option>
                      <option value="moodle" >Moodle</option>
                      <option value="claroline" >Claroline</option>
                    </select>
  
                  </div>
             </div> 
            
              <div class="col-md-3 ml-auto ">
                <div class="container-fluid">
                  <div class="form-group">
                      <label for="">Herramientas</label>
                       
                      @foreach($herramientas as $herramienta)
                        <div class="form-check form-check" required>
                          <input name="herramientas[{{$herramienta->herramienta}}]" class="form-check-input" type="checkbox" id="{{$herramienta->id}}">
                          <label class="form-check-label" for="{{$herramienta->id}}">{{$herramienta->herramienta}}</label>
                        </div>
                      @endforeach
                       
                  </div>
                </div>
              </div>
  
               <div class="col-md-4">
                    <div class="form-group ">
                        <label class="form-control-label" for="link">Link de la clase grabada</label>
                    <input type="url" id="link" name="link" class="form-control"  placeholder="https://example.com">
                    </div>
      
                    <div class="form-group ">
                      <label class="form-control-label" for="observacion">Observaciones</label>
                      <input type="input" id="observacion" name="observacion" class="form-control" placeholder="Ingrese sus observaciones" >
                    </div>

                    <div class="form-group ">
                      <label class="form-control-label" for="archivo">Archivos</label>
                          <input class="form-control " type="file" id="archivo" name="archivo" class="form-control">     
                    </div>
                    <hr>
                    <div class="form-group mt-3">

                     
                      <div class="form">
                              <a href="{{url('asistencias')}}"><button type="button"  class="btn btn-danger "><i class="fa fa-times fa-1x"></i> Canselar</button></a>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-1x"></i> Registrar Asistencia <input type="button" style=" background-color: Transparent;
                                background-repeat:no-repeat;
                                border: none;
                                cursor:pointer;
                                overflow: hidden;
                                outline:none;"  data-toggle="modal" data-target="#abrirmodal"/></button> 
                              
                      </div>
                    
                    </div>
                    @if(Request::get('mensaje'))
                    <div class="alert alert-danger p-0">
                      <ul>
                              <li>{{ Request::get('mensaje') }}</li>
                      </ul>
                  </div>
                    @endif
                    
                          @if ($errors->any())
                            <div class="alert alert-danger p-0">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @else
                            
                          @endif

                    {{-- modal alert --}}
                    <div class="modal" tabindex="-1" role="dialog" id="abrirmodal" name="abrirmodal">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Mensaje</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p id="mensaje">Ya no se puede registra este clase</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">SALIR</button>
                          </div>
                        </div>
                      </div>
                    </div>
             
              </div>
           </div>
          </div>
        </form> <!-- Fin del formulario --> 
      </div><!-- Fin del body card -->
    </div><!-- Fin card -->
    </div> <!-- Fin del div container fluid -->
  </main>

  <script type="text/javascript"> 
    function yesnoCheck(that) {
        if (that.value == "reposicion") {
            document.getElementById("inputfecha").style.display = "block";
        } else {
          document.getElementById("inputfecha").style.display = "none";
        }
    }
  </script>
@endsection