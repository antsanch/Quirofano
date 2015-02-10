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


  <h3 class="page-title">Programar cirugía</h3>
  <?php include_partial('qbreadcrumb', array('locacion' => 'Programar')) ?>

<div class="row">
  <a href="<?php echo url_for('agenda/show?slug='.$quirofano['Slug']) ?>" class="btn btn-circle blue-madison">Agenda de <?php echo $quirofano['Nombre'] ?></a>
</div>
<br />
<div class="row">
  <div class="portlet box blue">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-file"></i>
        Programar Cirugía
      </div>
    </div>
    <div class="portlet-body form">
      <form>
        <div class="form-body">

          <div class="row"><!-- Primer fila de campos (row01) -->
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['sala_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-h-square"></i></span>
                  <?php echo $form['sala_id']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['programacion']->renderLabel() ?>
                <?php echo $form['programacion']->render(array('class' => 'form-control')) ?>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['tiempo_est']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-retweet"></i></span>
                  <?php echo $form['tiempo_est']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['tipo_proc_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>
                <?php echo $form['tipo_proc_id']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row01 -->

          <div class="row"><!-- Segunda fila de campos (row02) -->
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['registro']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                  <?php echo $form['registro']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-9">
              <div class="form-group">
                <?php echo $form['paciente_name']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <?php echo $form['paciente_name']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row02 -->

          <div class="row"><!-- Tercer fila de campos (row03) -->
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['edad']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <?php echo $form['edad']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['genero']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <?php echo $form['genero']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['procedencia']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <?php echo $form['procedencia']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>


            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['servicio']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                <?php echo $form['servicio']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row03 -->

          <div class="row"><!-- Cuarta fila de campos (row04) -->
            <div class="col-sm-12 col-md-6">
              <div class="form-group">
                <?php echo $form['diagnostico']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
                <?php echo $form['diagnostico']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['protocolo']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
                <?php echo $form['protocolo']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['reintervencion']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                  <?php echo $form['reintervencion']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row04 -->

          <div class="row"><!-- Quinta fila de campos (row05) -->
            <div class="col-sm-6 col-md-9">
              <div class="form-group">
                <?php echo $form['programa']['personal_nombre']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                  <?php echo $form['programa']['personal_nombre']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['atencion_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <?php echo $form['atencion_id']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row05 -->

  <?php foreach ($form['Procedimientocirugia'] as $subform) :?><?php $i = 1; ?>
          <div class="row"><!-- Subformulario de procedimientos <?php echo $i ?> -->
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $subform['cie9mc']->renderLabel('Procedimiento Planeado') ?>
                <?php echo $subform['cie9mc']->render(array('class' => 'form-control')) ?>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $subform['region']->renderLabel() ?>
                <?php echo $subform['region']->render(array('class' => 'form-control')) ?>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $subform['detalles']->renderLabel() ?>
                <?php echo $subform['detalles']->render(array('class' => 'form-control')) ?>
              </div>
            </div>

            <div class="col-sm-6 col-md-2">
              <div class="form-group">
                <?php echo $subform['servicio_id']->renderLabel() ?>
                <?php echo $subform['servicio_id']->render(array('class' => 'form-control')) ?>
              </div>
            </div>

  <?php if (isset($subform['Eliminar'])): ?>
            <div class="col-sm-6 col-md-1">
              <div class="form-group">
                <?php echo $subform['Eliminar']->renderLabel() ?>
                <?php echo $subform['Eliminar']->render(array('class' => 'form-control')) ?>
              </div>
            </div>
  <?php endif; ?>

          </div><!-- Fin del subformulario <?php echo $i++ ?> -->
  <?php endforeach; ?>

          <div class="row"><!-- Sexta fila de campos (row06) -->
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <?php echo $form['riesgo_qx_pre']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                <?php echo $form['riesgo_qx_pre']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <?php echo $form['req_insumos']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                <?php echo $form['req_insumos']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <?php echo $form['req_anestesico']->renderLabel('Requerimientos de Anestésia') ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-spinner"></i></span>
                <?php echo $form['req_anestesico']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <?php echo $form['req_hemoderiv']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tint"></i></span>
                <?php echo $form['req_hemoderiv']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <?php echo $form['req_laboratorio']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-flask"></i></span>
                <?php echo $form['req_laboratorio']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <?php echo $form['requerimiento']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span>
                <?php echo $form['requerimiento']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row06 -->

        </div>
        <div class="form-actions right">
          <button type="submit" class="btn blue">Guardar</button>
          <button type="reset" class="btn default">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="menubar">
  <a href="<?php echo url_for('agenda/show?slug='.$quirofano['Slug']) ?>">Agenda de <?php echo $quirofano['Nombre'] ?></a>
</div>

<div class="formulario clearfix">
<h1 style="color:#FFFFFF;">Programar Cirugia</h1>
<?php //include_partial('programarForm', array('form' => $form, 'Quirofano' => $quirofano)) ?>
</div>
