<div class="container-fluid">
    <div class="row ">
        <div class="col-md-6">
          <div class="row">    
              <label class="col-auto">Facultad: </label>               
              <p class="col-auto">{{$horarios->first()->facultad}}</p>
          </div>
          <div class="row">                       
              <label class="col-auto">Carrera: </label>                
              <p class="col-auto">{{$horarios->first()->unidad}}</p>
           </div>
        </div>
    
        <div class="col-md-6">
          <div class="row">    
              <label class="col-auto">Materia: </label>               
              <p class="col-auto">{{$horarios->first()->nombre}}</p>
          </div>
          <div class="row">                       
              <label class="col-auto">Grupo: </label>                
              <p class="col-auto">{{$horarios->first()->grupo}}</p>
          
          </div>
          <div class="row">                       
              <label class="col-auto">Hora-Dia: </label>                
              <p class="col-auto">{{$horarios->first()->hora}} - {{$horarios->first()->dia}}</p>
          
          </div>
        
        </div>
       </div>
</div>
<hr class="mb-4">