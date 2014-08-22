<style>
  .cxrow td{
    background: white;
    border-bottom: 1px solid black;
    margin: 1px 0px;
  }

  .realizadas td{
    background: lightblue;
  }

  .transoperatorio td{
    background: lightgreen;
  }

  .atrasada td {
    background: red;
    color: white;
  }
</style>

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
    <li>Programar</li>
  </ul>
  <!-- END PAGE TITLE & BREADCRUMB-->

<div class="row">
  <div class="col-md-12">
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-check-square-o"></i>
          Validar
        </div>
      </div>
      <div class="portlet-body form">
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
  </div>
</div>

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

<div class="formulario clearfix">
<h1 style="color:#FFFFFF;">Programar Cirugia</h1>
  <form action="<?php echo url_for('agenda/validar') ?> " method="get">
    <div class="area cols12">
      <div class="label">Datos del paciente</div>
      <div class="field">
        <input id="search" name="search" type="text" value="<?php echo $search ?>" placeholder="Registro o nombre">
      </div>
    </div>

<?php if(isset($cirugias)): # @flag Se ha definido la variable cirugias ?>
    <div class="area cols12">
<?php if($cirugias->count() > 0):  # @flag Hay una o mas cirugias previas ?>
    <p><a href="<?php echo url_for('agenda/programar') ?> ">Programar cirugia </a></p>
      <table id="results" width="100%" border="0" cellspacing="0">
<?php foreach($cirugias as $cx): ?>
        <tr class="<?php echo $cx->getClasses() ?>">
          <td><?php echo $cx->getRegistro() ?> </td>
          <td><?php echo $cx->getPacienteName() ?> </td>
          <td><?php echo $cx->getLastTime('d-m-Y H:i') ?></td>
          <td><?php echo $cx->getDiagnostico() ?> </td>
          <td><?php echo $cx->getEspecialidad() ?> </td>
<?php switch($cx->getStatus()): ?>
<?php case -50 ?>
<?php case 1 ?>
          <td><a href="<?php echo url_for('agenda/reprogramar?id='.$cx->getId()) ?>">Reprogramar</a></td>
<?php break ?>
<?php case 10?>
          <td>En cirugia</td>
<?php break ?>
<?php case 100?>
          <td><a href="<?php echo url_for(sprintf('agenda/programar?cx=%s', $cx->getId())) ?>">Reintervenir</a></td>
<?php endswitch; ?>
<!--
          <td><?php echo $cx->getStatus() ?> </td>
          <td><?php echo $cx->getClasses() ?> </td>
-->
        </tr>
<?php endforeach; ?>
      </table>
<?php else: # @flag No se encontraron cirugias en el historial del paciente?>
  <p>No se han encontrado cirugias para ese paciente, puedes usar otro termino de busqueda como nombre completo, apellidos o registro</p>
  <p>Tambien puedes <a href="<?php echo url_for('agenda/programar') ?> ">programar una nueva cirugia </a></p>
<?php endif; ?>
    </div>
<?php endif; ?>
    <div class="area control">
      <div><input type="submit" value="Validar"></div>
    </div>
  </form>
</div>
