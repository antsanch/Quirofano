<?php function print_head() {
$head = <<<HEAD
   <tr>
    <th colspan="2">Iconos</th>
    <th>Fecha</th>
    <th>Hora</th>
    <th>Sala</th>
    <th>Registro</th>
    <th>Paciente</th>
    <th>Diagnóstico</th>
    <th>Procedimiento / Cirugía</th>
    <th>Médico que programo</th>
    <th>Acciones</th>
  </tr>
HEAD;
    return $head;
  }
?>

<!--    Va todo el menu de arriba-->
<div id="headtable">
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/index') ?>">&nbsp;&nbsp;Lista general de quirofanos&nbsp;&nbsp;</a>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/programar?slug='.$Quirofano->getSlug())?>" rel="facebox">&nbsp;&nbsp;Programar Cirugia&nbsp;&nbsp;</a>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/diferidas?slug='.$Quirofano->getSlug())?>">&nbsp;&nbsp;Cirugias Diferidas&nbsp;&nbsp;</a>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/canceladas?slug='.$Quirofano->getSlug())?>">&nbsp;&nbsp;Cirugias Canceladas del mes&nbsp;&nbsp;</a>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/todos?slug='.$Quirofano->getSlug().'&date='.date('Y-m-d', strtotime("now")))?>">&nbsp;&nbsp;Cirugias del mes&nbsp;&nbsp;</a>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/show?slug='.$Quirofano->getSlug().'&date='.date('Y-m-d', strtotime("now")))?>">&nbsp;&nbsp;Agenda del día&nbsp;&nbsp;</a>

<form action="<?php echo url_for('agenda/show') ?>" style="display:inline;">
  <input type="hidden" name="slug" value="<?php echo $Quirofano->getSlug() ?>">
  <input type="search" id="datepicker" name="date" placeholder="Fitrar por fecha" style="width:120px" value="<?php echo date('d-m-Y', $date) ?>">
  <input type="submit" value="Ir">
</form>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/show?slug='.$Quirofano->getSlug().'&date='.date('Y-m-d', $date - 86400))?>" title="<?php echo $date==strtotime('today') ? 'Ayer': date('Y-m-d', $date-86400) ?>">&nbsp;&nbsp;<&nbsp;&nbsp;</a>
<a class="button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" href="<?php echo url_for('agenda/show?slug='.$Quirofano->getSlug().'&date='.date('Y-m-d', $date + 86400))?>" title="<?php echo $date==strtotime('today') ? 'Mañana': date('Y-m-d', $date+86400) ?>">&nbsp;&nbsp;>&nbsp;&nbsp;</a>

<form action="<?php echo url_for('agenda/busqueda') ?>" style="display:inline; float:right;">
  <input type="text" id="busqueda" name="term" placeholder="Nombre o Registro" style="width:120px">
  <input type="submit" value="Buscar">
</form>
</div> <!-- Va todo el menu de arriba -->
