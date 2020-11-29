<div class="row mx-5">
    @foreach($horarios as  $horario)
    <div class="col-6">
      <div class="row">    
          <label class="col-sm">Facultad : </label>               
          <p class="col-sm-10">{{$horario->facultad}}</p>
      </div>
      <div class="row">                       
          <label class="col-sm">Carrera : </label>                
          <p class="col-sm-10">{{$horario->unidad}}</p>
       </div>
    </div>

    <div class="col-6">
      <div class="row">    
          <label class="col-sm">Materia : </label>               
          <p class="col-sm-10">{{$horario->nombre}}</p>
      </div>
      <div class="row">                       
          <label class="col-sm">Grupo : </label>                
          <p class="col-sm-10">{{$horario->grupo}}</p>
      
      </div>
      <div class="row">                       
          <label class="col-sm">Hora - Dia : </label>                
          <p class="col-sm-10">{{$horario->hora}} - {{$horario->dia}}</p>
      
      </div>
    
    </div>
   
    @endforeach
   </div>
   <hr>