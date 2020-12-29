<div class="form-group row">
    <label class="col-md-3 form-control-label" for="unidad">Nombre</label>
    <div class="col-md-9">
    <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off" value="{{$unidad->nombre}}" placeholder="Nombre de la unidad academica">   
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="facultad">Facultad</label>
    <div class="col-md-9">
    <select  type="text" name="facultad" id="facultad" class="form-control" value="{{$unidad->facultad}}" placeholder="Ingrese la facultad"  >
        <option >Ciencias y tecnologia</option>
        <option >Ciencias Economicas</option>
        <option >Medicina</option>
        <option >Odontologia</option>
    </select>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-1x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success rounded"><i class="fa fa-save fa-1x"></i> Guardar</button>
</div>

