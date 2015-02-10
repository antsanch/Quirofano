<div class="col-md-6">
<div class="portlet box blue">
  <div class="portlet-title">
  <div class="caption">
      <i class="fa fa-search"></i> Busqueda Personalizada
  </div>
</div>
<div class="portlet-body form">
<form action="<?php echo url_for('agenda/busquedapersonalisada') ?>" class="form-horizontal">
<div class="form-body">
<div class="form-group">
    <label class="col-md-3">Quirofano</label>
      <div class="col-md-9">
        <input class="form-control" type="text" id="busqueda" name="Quirofano" placeholder="Nombre del quirofano">
      </div>
</div>

<div class="form-group">
    <label class="col-md-3">Sala</label>
      <div class="col-md-9">
        <input class="form-control" type="text" id="busqueda" name="Sala" placeholder="Sala">
      </div>
</div>


<div class="form-group">
    <label class="col-md-3">Nombre</label>
      <div class="col-md-9">
        <input class="form-control" type="text" id="busqueda" name="Nombre" placeholder="Nombre">
      </div>
</div>

<div class="form-group">
    <label class="col-md-3">Mes</label>
<div class="col-md-9">
<select id= "busqueda "name="Mes" class="form-control"> 
   <option value="01">Enero</option> 
   <option value="02">Febrero</option> 
   <option value="03">Marzo</option>
   <option value="04">Abril</option>
   <option value="05">Mayo</option>
   <option value="06">Junio</option>
   <option value="07">Julio</option>
   <option value="08">Agosto</option>
   <option value="09">Septiembre</option>
   <option value="10">Octubre</option>
   <option value="11">Noviembre</option>
   <option value="12">Diciembre</option> 
</select> 
</div>
</div>

<div class="form-group">
    <label class="col-md-3">Año</label>
      <div class="col-md-9">
        <input class="form-control" type="number" id="busqueda" name="Año" placeholder="Año"  min="2013" maxlength="4" value="2015">
      </div>
</div>
</div>

<div class="form-actions">
    <input class="btn btn-primary btn-block" type="submit" value="Buscar">
</div>
</form>
</div>
</div>
</div>
