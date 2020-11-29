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

            <form action="" method="POST">
               {{csrf_field()}}
            </form>
          
          {{-- Incluye el formulario de llenado automatico --}}
           @include('asistencia.formAuto')

         <div class="row">
            <div class="col-4 mx-5">
                <div class="form-group">
                    <label for="cont-clase">Contenido de la clase:</label>
                        <textarea placeholder="Ingrese el contenido avanzado en la clase" class="form-control" name="cont-clase" id="cont-clase"  rows="3"></textarea>
                    
                </div>
                <div class="form-group">
                  <label class="form-control-label" for="tipoclase">Tipo de clase</label>
                  <select class="form-control inputpicker" name="tipoclase" id="tipoclase" data-live-search="true">                              
                    {{-- <option value="0" inputed="true" disabled="disable" >Seleccione</option> --}}
                    <option value="normal" inputed="true">Normal</option>
                    <option value="reposicion" >Reposicion</option>
                  </select>
                </div>

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
            <div class="col-2 mx-5">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Herramientas</label>
                     
                    @foreach($herramientas as $herramienta)
                    <div class="form-check form-check">
                        <input class="form-check-input" type="checkbox" id="{{$herramienta->id}}" value="option1">
                    <label class="form-check-label" for="{{$herramienta->id}}">{{$herramienta->herramienta}}</label>
                      </div>
                        
                    @endforeach
                     
                </div>
            </div>

             <div class="col-4">
              <div class="form-group row">
                  <label class="form-control-label" for="link-class">Link de la clase</label>
                  <input type="input" id="link-class" name="link-class" class="form-control" placeholder="Ingrese link de la clase grabada" required pattern="[0-9]{0,15}">
              </div>

              <div class="form-group row">
                <label class="form-control-label" for="link-class">Observaciones</label>
                <input type="input" id="link-class" name="link-class" class="form-control" placeholder="Ingrese sus observaciones" required pattern="[0-9]{0,15}">
              </div>

              <div class="form-group row">
                <div class="container ">
                        <button type="button" class="btn btn-danger"><i class="fa fa-times fa-1x"></i> Canselar </button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-1x"></i> Registrar Asistencia</button> 
                    </div>
              </div>
            
            </div>
         </div>
      </div><!-- Fin del body card -->
    </div><!-- Fin card -->
    </div> <!-- Fin del div container fluid -->
  </main>
@endsection