<div>
  <div class="row">
    <div class="col-xs-2">
    <form action="<?php echo url_for('agenda/show') ?>" style="display:inline;"> <!-- TODO: remplazar este display:inline por form-inline-->
      <!--<input type="hidden" name="slug" value="<?php echo $Quirofano['Slug'] ?>">-->
      <div class="form-group">
        <div class="input-group">
          <div class="input-icon">
            <i class="icon-calendar"></i>
            <input type="search" class="datepicker form-control" name="date" placeholder="Fitrar por fecha" value="<?php echo date('d-m-Y', $date) ?>">
          </div>
          <span class="input-group-btn">
            <input type="submit" class="btn btn-secondary" value="Ir">
          </span>
        </div>
      </div>
    </form>
  </div>
  <div class="col-xs-5">
    <ul class="nav nav-pills">
      <li><a href="<?php echo url_for('agenda/show?slug='.$Quirofano['Slug'].'&date='.date('Y-m-d', $date - 86400))?>" title="<?php echo $date==strtotime('today') ? 'Ayer': date('Y-m-d', $date-86400) ?>"><</a></li>
          <li><a href="<?php echo url_for('agenda/show?slug='.$Quirofano['Slug'].'&date='.date('Y-m-d', $date + 86400))?>" title="<?php echo $date==strtotime('today') ? 'Mañana': date('Y-m-d', $date+86400) ?>">></a></li>
      </ul>
  </div>
  <div class="col-xs-5">
    <form action="<?php echo url_for('agenda/busqueda') ?>">
      <div class="form-group">
        <div class="input-group">
          <div class="input-icon">
            <i class="icon-magnifier"></i>
            <input class="form-control" type="text" id="busqueda" name="term" placeholder="Nombre o Registro">
          </div>
          <span class="input-group-btn">
            <input class="btn btn-primary" type="submit" value="Buscar">
          </span>
        </div>
      </div>
    </form>
  </div>
  </div>
  <div class="row">
    <ul class="nav nav-tabs nav-justified">
      <!--<li><a href="<?php echo url_for('agenda/validar')?>">Programar Cirugía</a></li>-->
      <li id="agendaDelDia"><a href="<?php echo url_for('agenda/show?date='.date('Y-m-d', strtotime(" now ")))?>">Agenda del día</a></li>
      <li id="diferidas"><a href="<?php echo url_for('agenda/diferidas')?>">Cirugias diferidas</a></li>
      <li id="canceladas"><a href="<?php echo url_for('agenda/canceladas')?>">Cirugias canceladas del mes</a></li>
      <li id="delMes"><a href="<?php echo url_for('agenda/todos?date='.date('Y-m-d', strtotime("now")))?>">Cirugias del mes</a></li>
    </ul>
  </div>
</div>

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>