<div class="card">
    <div class="card-header">

       <h2>Listados de Asistencias </h2><br/>
       
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
            {{-- <div class="col-md-6">
            {!! Form::open(array('url'=>'asistencias','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
                <div class="input-group">
                   
                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="">
                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                </div>
            {{Form::close()}}
            </div> --}}
            {{-- <div class="form-group row"> --}}
                <div class="col-md-4">
                {!! Form::open(array('url'=>"generarReporte",'method'=>'POST','target' => '_blank','role'=>'search')) !!} 
                {{ csrf_field() }}
                    <div class="input-group">
                        {{-- <p name="gato" value="esto es un ejemplo" ></p>  --}}
                    {{-- <input hidden name="iduser" class="form-control" value="{{$iduser}}"> --}}
                    <input hidden name="fechainicio" class="form-control" value="{{$fechainicio}}">
                    <input hidden name="fechafin" class="form-control" value="{{$fechafin}}">
                    {{-- <input hidden name="buscarTexto" class="form-control" value="{{$buscarTexto}}"> --}}

                        <button type="submit"  class="btn btn-primary"><i class="fa fa-document"></i> Generar Reporte pdf</button>
                    </div>
                {{Form::close()}}
                </div>
            {{-- </div> --}}
        </div>
        <div class="form-group row">
            {!! Form::open(array('url'=>"asistencias",'method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
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
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Rol</th>
                        <th>Cod SIS</th>
                        <th width="99">Fecha&nbsp;Registro</th>
                        <th>Hora</th>
                        <th>Dia</th>
                        <th>Grupo</th>
                        <th>idM</th>
                        <th>Materia</th>
                        <th width="99">Fecha&nbsp;clase</th>
                        <th width="5">Clase</th>
                        @if($contador!=0)
                            
                        <th width="96">Feha de Repocision</th>
                        @endif
                        <th width="350">Contenido</th>
                        <th>Platafoma</th>
                        <th>Observaciones</th> 
                        <th>Link</th>
                        <th>Carrera</th>
                        {{-- <th>Facultad</th> --}}
                        <th width="10">Herramientas</th>
                        {{-- "google doc<br>google meet" --}}
                        
                    </tr>
                </thead>
                <tbody>

                @foreach($asistencias as $asistencia)
                
                <tr>
                        <td class="align-middle">{{$asistencia->nombre}}</td>
                        <td class="align-middle">{{$asistencia->apellido}}</td>
                        <td class="align-middle">{{$asistencia->rol}}</td>
                        <td class="align-middle">{{$asistencia->codsis}}</td>
                        <td class="align-middle">{{$asistencia->created_at}}</td>
                        <td class="align-middle">{{$asistencia->hora}}</td>
                        <td class="align-middle">{{$asistencia->dia}}</td>
                        <td class="align-middle">{{$asistencia->grupo}}</td>
                        <td class="align-middle">{{$asistencia->idmateria}}</td>
                        <td class="align-middle">{{$asistencia->materia}}</td>
                        <td class="align-middle">{{$asistencia->fecha}}</td>
                        <td class="align-middle">{{$asistencia->tipoclase}}</td>
                        @if($contador!=0)
                        <td class="align-middle">{{$asistencia->fecharepo}}</td>
                        @endif
                        <td class="align-middle">{{$asistencia->contenido}}</td>
                        <td class="align-middle">{{$asistencia->plataforma}}</td>
                        <td class="align-middle">{{$asistencia->observacion}}</td>
                        <td class="align-middle"><a href="{{$asistencia->link}}" title="{{$asistencia->link}}" target="blank"> {!! !empty($asistencia->link) ? '<i class="fas fa-video"></i>' : '' !!}</a></td>
                        <td class="align-middle">{{$asistencia->unidad}}</td>
                        {{-- <td class="align-middle">{{$asistencia->facultad}}</td> --}}
                        <td class="align-middle">{!!$asistencia->herramientas!!}</td>
                        
                    </tr>

                    @endforeach
                
                </tbody>
            </table>
        </div> 

        {{-- {{$asistencia->render()}} --}}
        
    </div>
</div>