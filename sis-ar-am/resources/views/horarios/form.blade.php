<input hidden type="text" name="materia" id="materia" class="form-control" autocomplete="off" value="{{$materia->id}}"> 

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="unidad">Hora</label>
    <div class="col-md-9">
        <input type="text" name="hora" id="hora" class="form-control" autocomplete="off" placeholder="Hora de clase" required>   
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="dia">Dia</label>
    <div class="col-md-9">
    <select  type="text" name="dia" id="dia" class="form-control" placeholder="Ingrese Dia" >
        {{-- <option selected="true" disabled="disabled">Seleccione Dia</option> --}}
        <option >LU</option>
        <option >MA</option>      
        <option >MI</option>      
        <option >JU</option>      
        <option >VI</option>      
        <option >SA</option>      
    </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="tipo">Tipo</label>
    <div class="col-md-9">
    <select  type="text" name="tipo" id="tipo" class="form-control" placeholder="Ingrese la unidad">
        {{-- <option selected="true" disabled="disabled">Seleccione</option> --}}
        <option >docent</option>
        <option >aux</option>      
    </select>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-1x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success rounded"><i class="fa fa-save fa-1x"></i> Guardar</button>
</div>