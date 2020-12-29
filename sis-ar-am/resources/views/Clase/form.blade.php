       


     <div class="form-group row">
            <label class="col-md-3 form-control-label" for="personal">Personal Academico</label>
            
            <div class="col-md-9">
            
                <select  class="form-control"  name="personal" id="personal">
                                                
                <option value="0" disabled>Seleccione</option>
                
                    @foreach($users as $user)
                    
                        <option value="{{$user->id}}">{{$user->nombre}} {{$user->apellido}}</option>
                            
                    @endforeach

                </select>
            
            </div>
                                       
    </div>
     <div class="form-group row">
            <label class="col-md-3 form-control-label" for="materia">Materias</label>
            
            <div class="col-md-9">
            
                <select  class="form-control"  name="materia" id="materia">
                                                
                <option value="0" disabled>Seleccione</option>
                
                    @foreach($materias as $materia)
                    
                <option value="{{$materia->id}}">{{$materia->id}} |  Grupo: {{$materia->grupo}} | {{$materia->nombre}}</option>
                            
                    @endforeach

                </select>
            
            </div>
                                       
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Asignar Materia</button>
        
    </div>