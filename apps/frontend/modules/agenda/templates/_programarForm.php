<?php use_helper("programarCirugiaForm") ?>
<div>
  <div class="portlet box blue">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-file"></i>
        Programar Cirugía
      </div>
    </div>
    <div class="portlet-body form">
      <form id="target" method="post">
        <div class="form-body">

          <div class="row"><!-- Primer fila de campos (row01) -->
            <div class="col-sm-6 col-md-3">
              <div class="form-group">
                <?php echo $form['sala_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-h-square"></i></span>
                  <?php echo $form['sala_id']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['programacion']->hasError()) ?>">
                <label>Fecha</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['programacion']) ?>
                    <input class="form-control datepicker" placeholder="DD-MM-AAAA" type="text" name="agenda[programacion][date]">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['hora']->hasError()) ?>">
                <label>Hora</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['hora']) ?>
                    <input class="form-control timepicker" placeholder="HH:MM" type="text" name="agenda[programacion][time]">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['tiempo_est']->hasError()) ?>">
                <?php echo $form['tiempo_est']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-retweet"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['tiempo_est']) ?>
                    <?php echo $form['tiempo_est']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

          </div> <!-- Cierre del row01 -->

          <div class="row"><!-- Segunda fila de campos (row02) -->
            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['registro']->hasError()) ?>">
                <?php echo $form['registro']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['registro']) ?>
                    <?php echo $form['registro']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php echo getClasesCss($form['paciente_name']->hasError()) ?>">
                <?php echo $form['paciente_name']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['paciente_name']) ?>
                    <?php echo $form['paciente_name']->render(array('class' => 'form-control')) ?>
                  </div>
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
          </div> <!-- Cierre del row02 -->

          <div class="row"><!-- Tercer fila de campos (row03) -->
            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['edad']->hasError()) ?>">
                <?php echo $form['edad']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['edad']) ?>
                    <?php echo $form['edad']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['genero']->hasError()) ?>">
                <?php echo $form['genero']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['genero']) ?>
                    <?php echo $form['genero']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['procedencia']->hasError()) ?>">
                <?php echo $form['procedencia']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['procedencia']) ?>
                    <?php echo $form['procedencia']->render(array('class' => 'form-control')) ?>
                  </div>
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
              <div class="<?php echo getClasesCss($form['diagnostico']->hasError()) ?>">
                <?php echo $form['diagnostico']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['diagnostico']) ?>
                    <?php echo $form['diagnostico']->render(array('class' => 'form-control')) ?>
                  </div>
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
              <div class="<?php echo getClasesCss($form['programa']->hasError()) ?>">
                <?php echo $form['programa']['personal_nombre']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['programa']['personal_nombre']) ?>
                    <?php echo $form['programa']['personal_nombre']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-3">
              <div class="<?php echo getClasesCss($form['atencion_id']->hasError()) ?>">
                <?php echo $form['atencion_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-chain"></i></span>
                <?php echo $form['atencion_id']->render(array('class' => 'form-control')) ?>
                </div>
              </div>
            </div>
          </div> <!-- Cierre del row05 -->

        <!-- Subformulario para agregar procedimientos -->
         <?php foreach ($form['Procedimientocirugia'] as $subform) :?>
          <div class="formCie9">
          <?php echo $subform;?>
          </div>
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
                <?php echo $form['req_anestesico']->renderLabel('Requerimientos de anestesia') ?>
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
          <?php echo $form->renderHiddenFields() ?>
        </div>
        <div class="form-actions right">
          <input type="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>