<script type="text/javascript" src="/js/global/jquery.ptTimeSelect.js"></script>    <!-- 1.8.2 -->
<link rel="stylesheet" type="text/css" href="/css/global/jquery.ptTimeSelect.css" />
<style>
/* Mientras podemos hacer botones con jQueryUI usamos css */

.menubar a {
  background: white;
  border: 1px solid black;
  color: blue;
  margin: 0 0 3px 0;
  padding: 2px 4px;
  text-decoration: none;
}

.menubar a:hover {
  background: lightgray;
}
</style>
  <!--
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> <!---->

<?php slot('titulo') ?>
  <title>Programar Cirugía | SIGA-Qx </title>
<?php end_slot() ?>

  <!-- BEGIN PAGE TITLE & BREADCRUMB-->

  <h3 class="page-title">Programar cirugía</h3>

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

<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-home"></i>
      Programar Cirugía
    </div>
  </div>
  <div class="portlet-body form">
    <form>
      <div class="form-body">
        <div class="row">

          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <?php echo $form['sala_id']->renderLabel() ?>
              <?php echo $form['sala_id']->render(array('class' => 'form-control')) ?>
            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <?php echo $form['programacion']->renderLabel() ?>
              <?php echo $form['programacion']->render(array('class' => 'form-control')) ?>
            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="form-group">
              <?php echo $form['tiempo_est']->renderLabel() ?>
              <?php echo $form['tiempo_est']->render(array('class' => 'form-control')) ?>
            </div>
          </div>

        </div>
      </div>
      <div class="form-actions right">
      </div>
    </form>
  </div>
</div>

<div class="menubar">
  <a href="<?php echo url_for('agenda/show?slug='.$quirofano['Slug']) ?>">Agenda de <?php echo $quirofano['Nombre'] ?></a>
</div>

<div class="formulario clearfix">
<h1 style="color:#FFFFFF;">Programar Cirugia</h1>
<?php //include_partial('programarForm', array('form' => $form, 'Quirofano' => $quirofano)) ?>
</div>
