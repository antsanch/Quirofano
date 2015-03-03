<?php slot('titulo') ?>
  <title>Diferir cirugia | SIGA-HU </title>
<?php end_slot() ?>

<div>
  <div class="name"><?php echo $cirugia->getPacienteName() ?></div>
  <div>Registro: <?php echo "registro del paciente" ?></div>
</div>

<div class="alert alert-danger">
  <?php echo $sf_user->getFlash('obligar')?>
</div>

<h3 class="page-title">Diferir Cirugia</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Diferir cirugía')) ?>

<div class="formulario clearfix">
  <form action="" method="POST">
  <div class="area cols12">
    <div>
      <?php echo $form['causa_diferido_id']->renderLabel() ?>
      <?php echo $form['causa_diferido_id']->renderError() ?>
    </div>
    <div><?php echo $form['causa_diferido_id'] ?></div>
  </div>
  <div class="area control">
    <?php echo $form->renderHiddenFields() ?>
    <input type="submit" class="btn btn-primary" value="Diferir" />

  </div>
  </form>
</div>
