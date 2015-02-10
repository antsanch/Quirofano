<div class="col-md-6">
<div class="portlet box blue">
  <div class="portlet-title">
  <div class="caption">
      <i class="fa fa-sliders"></i> Agregar Quirofano
  </div>
</div>
<div class="portlet-body form">
<form id="target" method="post" class="form-horizontal">
<div class="form-body">
<div class="form-group">
    <label class="col-md-3 control-label"><?php echo $form['nombre']->renderLabel() ?></label>
    <div class="col-md-9">
      <?php echo $form['nombre'] ?>
      <?php echo $form['nombre']->renderError() ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label"><?php echo $form['permisos']->renderLabel() ?></label>
    <div class="col-md-9">
      <?php echo $form['permisos'] ?>
      <?php echo $form['permisos']->renderError() ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label"><?php echo $form['activo']->renderLabel() ?></label>
    <div class="col-md-9">
      <?php echo $form['activo'] ?>
      <?php echo $form['activo']->renderError() ?>
    </div>
</div>

<div class="form-group">
      <label class="col-md-3 control-label"><?php echo $form['ambulatorio']->renderLabel() ?></label>
      <div class="col-md-9">
      <?php echo $form['ambulatorio'] ?>
      <?php echo $form['ambulatorio']->renderError() ?>
    </div>
</div>

<div class="form-actions">
    <?php echo $form->renderHiddenFields() ?>
    <input type="submit" class="btn btn-primary btn-block" value="Agregar">
</div>
</div>
</form>
</div>
</div>
</div>