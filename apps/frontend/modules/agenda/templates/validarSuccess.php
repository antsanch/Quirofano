<?php slot('titulo') ?>
  <title>Validar cirugia:  <?php echo $search ?> | SIGA-HU </title>
<?php end_slot() ?>

  <!-- BEGIN PAGE TITLE & BREADCRUMB-->

  <h3 class="page-title">Validar cirugía</h3>

  <ul class="page-breadcrumb breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="<?php echo url_for('@homepage') ?> ">Inicio</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="<?php echo url_for('agenda/index') ?> ">Quirofanos</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>Validar</li>
  </ul>
  <!-- END PAGE TITLE & BREADCRUMB-->

<div class="row">
  <div class="col-md-12">
    <form role="form">
      <div class="form-body">
        <div class="form-group">

          <div class="input-group">
            <div class="input-icon">
              <i class="fa fa-user"></i>
              <input class="form-control" id="search" name="search" type="text" value="<?php echo $search ?>" placeholder="Registro o nombre">
            </div>
            <span class="input-group-btn">
              <button type="submit" class="btn blue">
                <i class="fa fa-check fa-fw"></i> Validar
              </button>
            </span>
          </div>

        </div>
      </div>
    </form>
  </div>
</div>

<?php if(isset($cirugias)): ?>

<div class="row">
  <div class="col-md-12">
<?php if($cirugias->count() > 0): ?>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Registro</th>
            <th>Nombre</th>
            <th>Programación</th>
            <th>Cirugía</th>
            <th>Servicio</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
<?php foreach($cirugias as $cx): ?>
        <tr class="<?php echo $cx->getStatusClass() ?>">
          <td style="white-space:nowrap"><?php echo $cx->getRegistro() ?> </td>
          <td style="white-space:nowrap"><?php echo $cx->getPacienteName() ?> </td>
          <td style="white-space:nowrap"><?php echo $cx->getLastTime('d-m-Y H:i') ?></td>
          <td><?php echo $cx->getDiagnostico() ?> </td>
          <td style="white-space:nowrap"><?php echo $cx->getEspecialidad() ?> </td>
          <td><?php
          switch($cx->getStatus()) {
            case AgendaPeer::DIFERIDA_STATUS:
              echo link_to('Reprogramar', 'agenda/reprogramar?id='.$cx->getId(), array('class' => 'btn red-thunderbird'));
              break;
            case AgendaPeer::PROGRAMADA_STATUS:
              echo link_to('Reprogramar', 'agenda/reprogramar?id='.$cx->getId(), array('class' => 'btn yellow-gold'));
              break;
            case AgendaPeer::TRANSOPERATORIO_STATUS:
              echo 'En cirugía';
              break;
            case AgendaPeer::REALIZADA_STATUS:
              echo link_to('Reintervenir', 'agenda/programar?id='.$cx->getId(), array('class' => 'btn blue-steel'));
              break;
          } ?></td>
        </tr>
<?php endforeach; ?>
        </tbody>
      </table>
    </div>
<?php else: # @flag No se encontraron cirugias en el historial del paciente?>
    <div class="alert alert-danger">  
      <p>No se han encontrado cirugias para ese paciente, puedes usar otro termino de busqueda como nombre completo, apellidos o registro.</p>
    </div>
    <p>Tambien puedes <a href="<?php echo url_for('agenda/programar') ?>" >programar una cirugía.</a></p>
<?php endif; ?>
  </div>
</div>

<?php if($cirugias->count() > 10): ?>
<div class="row">
  <div class="col-md-12">
    <a class="btn blue" href="<?php echo url_for('agenda/programar') ?>">Programar Cirugia</a>
  </div>
</div>
<?php endif; ?>
<?php endif; ?>
