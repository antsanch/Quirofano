<?php use_helper("metronicForm") ?>
<div>
  <div class="portlet padingless">
    <div class="portlet-title">
      <div class="caption">
        <i class="fa fa-file"></i>
        Filtro
      </div>
    </div>

    <div class="portlet-body form">
      <form id="target" method="get">
        <div class="form-body">

          <div class="row"><!-- Primer fila de campos (row01) -->

            <div class="col-sm-6 col-md-6">
              <div class="<?php echo getClasesCss($filter['programacion']->hasError()) ?>">
                <label>Desde</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($form['programacion']) ?>
                    <input class="form-control datepicker" placeholder="DD-MM-AAAA" type="text" name="agenda_filters[programacion][from][date]">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($form['programacion']->hasError()) ?>">
                <label>Hasta</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($form['programacion']) ?>
                    <input class="form-control datepicker" placeholder="DD-MM-AAAA" type="text" name="agenda_filters[programacion][to][date]">
                  </div>
                </div>
              </div>
            </div>

          </div> <!-- Fin primer fila de campos (row01) -->

          <div class="row">

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['medico_name']->hasError()) ?>">
                <?php echo $filter['medico_name']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['medico_name']) ?>
                    <?php echo $filter['medico_name']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-4 col-md-4">
              <div class="<?php //echo getClasesCss($filter['causa_diferido_id']->hasError()) ?>">
                <?php echo $filter['causa_diferido_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['causa_diferido_id']) ?>
                    <?php echo $filter['causa_diferido_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-2 col-md-2">
              <div class="<?php //echo getClasesCss($filter['reintervencion']->hasError()) ?>">
                <?php echo $filter['reintervencion']->renderLabel() ?>
                <div class="input-group">
                  <!--<span class="input-group-addon"><i class="fa fa-user-md"></i></span>-->
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['reintervencion']) ?>
                    <?php echo $filter['reintervencion']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['quirofano_id']->hasError()) ?>">
                <?php echo $filter['quirofano_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['quirofano_id']) ?>
                    <?php echo $filter['quirofano_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['quirofano_id']->hasError()) ?>">
                <?php echo $filter['totales']['quirofano_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['quirofano_id']) ?>
                    <?php echo $filter['totales']['quirofano_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['sala_id']->hasError()) ?>">
                <?php echo $filter['sala_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['sala_id']) ?>
                    <?php echo $filter['sala_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['totales']['sala_id']->hasError()) ?>">
                <?php echo $filter['totales']['sala_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['totales']['sala_id']) ?>
                    <?php echo $filter['totales']['sala_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['servicio']->hasError()) ?>">
                <?php echo $filter['servicio']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['servicio']) ?>
                    <?php echo $filter['servicio']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['totales']['servicio']->hasError()) ?>">
                <?php echo $filter['totales']['servicio']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['totales']['servicio']) ?>
                    <?php echo $filter['totales']['servicio']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['totales']['servicio']->hasError()) ?>">
                <?php echo $filter['contaminacionqx_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['totales']['servicio']) ?>
                    <?php echo $filter['contaminacionqx_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['totales']['contaminacionqx_id']->hasError()) ?>">
                <?php echo $filter['totales']['contaminacionqx_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['totales']['contaminacionqx_id']) ?>
                    <?php echo $filter['totales']['contaminacionqx_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

          </div> 

          <div class="row"> 

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['tipo_proc_id']->hasError()) ?>">
                <?php echo $filter['tipo_proc_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['tipo_proc_id']) ?>
                    <?php echo $filter['tipo_proc_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['totales']['tipo_proc_id']->hasError()) ?>">
                <?php echo $filter['totales']['tipo_proc_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['totales']['tipo_proc_id']) ?>
                    <?php echo $filter['totales']['tipo_proc_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['atencion_id']->hasError()) ?>">
                <?php echo $filter['atencion_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['atencion_id']) ?>
                    <?php echo $filter['atencion_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6 col-md-6">
              <div class="<?php //echo getClasesCss($filter['totales']['atencion_id']->hasError()) ?>">
                <?php echo $filter['totales']['atencion_id']->renderLabel() ?>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-question"></i></span>
                  <div class="input-icon right">
                    <?php //renderErrorIcon($filter['totales']['atencion_id']) ?>
                    <?php echo $filter['totales']['atencion_id']->render(array('class' => 'form-control')) ?>
                  </div>
                </div>
              </div>
            </div>
          </div> 

          <div class="form-actions right">
            <input type="submit" class="btn btn-primary" value="Ver reporte"/>
            <input type="submit" name="save_reporte" class="btn btn-primary" value="Guardar reporte"/>
          </div>
      </form>
    </div>
  </div>
</div>
</div>
