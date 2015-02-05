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

<h3>Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h3>
<ul class="page-breadcrumb breadcrumb">
    <li class="btn-group">
    </li>
    <li>
      <i class="fa fa-home"></i>
      <a href="/index.php/ ">Inicio</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="/index.php/ ">Quirofanos</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li> <?php echo $Quirofano['Nombre'] ?></li>
</ul>

<div>
  <div class="row">
    <div class="col-xs-2">
    <form action="<?php echo url_for('agenda/show') ?>" style="display:inline;">
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
            <input class="btn btn-secondary" type="submit" value="Buscar">
          </span>
        </div>
      </div>
    </form>
  </div>
  </div>
  <div class="row">
    <ul class="nav nav-tabs nav-justified">
      <!--<li><a href="<?php echo url_for('agenda/validar')?>">Programar Cirugía</a></li>-->
      <li><a href="<?php echo url_for('agenda/show?date='.date('Y-m-d', strtotime(" now ")))?>">Agenda del día</a></li>
      <li><a href="<?php echo url_for('agenda/diferidas')?>">Cirugias diferidas</a></li>
      <li><a href="<?php echo url_for('agenda/canceladas')?>">Cirugias canceladas del mes</a></li>
      <li><a href="<?php echo url_for('agenda/todos?date='.date('Y-m-d', strtotime("now")))?>">Cirugias del mes</a></li>
    </ul>
  </div>
</div>