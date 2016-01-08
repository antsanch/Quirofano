<?php slot('titulo') ?>
  <title>Diferir cirugía | SIGA-HU </title>
<?php end_slot() ?>

<h3 class="page-title">Diferir cirugía</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Diferir cirugía')) ?>

<?php
  $aviso = $sf_user->getFlash('obligar');
  if($aviso) {
    echo "<div class='alert alert-danger'>";
    echo $aviso;
    echo '</div>';
  }
?>

<div class="row">
  <form action="" method="post" class="form-horizontal">
    <div style="padding-left: 1.2em;">
      <?php echo $form['causa_diferido_id']->renderLabel() ?>
      <?php echo $form['causa_diferido_id']->renderError() ?>
    </div>
    <div class="col-md-4">
      <?php echo $form['causa_diferido_id'] ?> <!-- class form-control -->
    </div>
    <?php echo $form->renderHiddenFields() ?>
    <div class="col-md-2">
      <input type="submit" class="btn btn-primary" value="Diferir"/>
    </div>
  </form>
</div>
</br>
<div class="panel-group accordion" id="acordDetalles">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#acordDetalles" href="#collapseDetallesProg" aria-expanded="false">
      <i class="fa fa-plus"></i>
      Detalles de la programación de <?php echo $cirugia->getPacienteName() ?></a>
      </h4>
    </div>
    <div id="collapseDetallesProg" class="panel-collapse collapse" aria-expanded="false">
      <div class="panel-body">
        <?php include_partial("detailsProgramacion", array('cirugia' => $cirugia)); ?>                    
      </div>
    </div>
  </div>                              
</div>