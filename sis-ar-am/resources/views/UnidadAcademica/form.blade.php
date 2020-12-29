<div class="form-group row">
    <label class="col-md-3 form-control-label" for="unidad">Nombre</label>
    <div class="col-md-9">
        <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off" placeholder="Nombre de la unidad academica">   
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="facultad">Facultad</label>
    <div class="col-md-9">
    <select  type="text" name="facultad" id="facultad" class="form-control" placeholder="Ingrese la facultad">
        <option selected="true" disabled="disabled">Seleccione</option>
        <option >Ciencias y tecnologia</option>
        <option >Ciencias Jurídicas y Políticas</option>
        <option >Ciencias Economicas</option>
        <option >Humanidades y Ciencias de la Educación</option>
        <option >Arquitectura y Ciencias del Hábitat</option>
        <option >Ciencias Agrícolas y Pecuarias</option>
        <option >Medicina</option>
        <option >Odontología</option>
        <option >Ciencias Bioquímicas y Farmacéuticas</option>
        <option >Politécnica del Valle Alto</option>
        <option >Ciencias Sociales</option>
        <option >Desarrollo Rural</option>
        <option >Ciencias Veterinarias</option>
        <option >Enfermería</option>
        <option >Unidad Desconcentrada del Valle de Sacta</option>
    </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="jefe">Jefe de Unidad</label>
    <div class="col-md-9">
        <select  class="form-control"  name="jefe" id="jefe">                                
        <option value="0" selected="true" disabled="disabled">Seleccione</option>
            @foreach($jefes as $jefe)      
                <option value="{{$jefe->id}}">{{$jefe->nombre}}</option>        
            @endforeach
        </select>    
    </div>                               
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-1x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success rounded"><i class="fa fa-save fa-1x"></i> Guardar</button>
</div>