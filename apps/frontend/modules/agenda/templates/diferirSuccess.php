<?php slot('titulo') ?>
  <title>Diferir cirugia | SIGA-HU </title>
<?php end_slot() ?>
<?php if($form->getObject()): ?>
<div id="idTag" class="clearfix">
  <div class="name"><?php echo 'nombredelpasiente'?></div>
  <div><span class="label">Registro: </span><span><?php echo 'registro' ?></span></div>
</div>
<?php endif; ?>
<div id="alert">
<?php echo $sf_user->getFlash('obligar')?>
</div>

<div class="formulario clearfix">
  <form action="" method="POST">
  <h1>Diferir Cirugia</h1>
  <div class="area cols12">
    <div class="label">
      <?php echo $form['causa_diferido_id']->renderLabel() ?>
      <?php echo $form['causa_diferido_id']->renderError() ?>
    </div>
    <div class="field"><?php echo $form['causa_diferido_id'] ?></div>
  </div>
  <div class="area control">
    <?php echo $form->renderHiddenFields() ?>
    <input type="submit" value="Aceptar" />
  </div>
  </form>
</div>