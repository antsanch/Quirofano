<?php use_helper('metronicForm') ?>
<?php use_stylesheet('admin/css/tasks.css') ?>
<?php use_javascript('admin/scripts/tasks.js') ?>

<?php slot('titulo') ?>
  <title>Postoperatorio | SIGA-HU </title>
<?php end_slot() ?>

<h3 class="page-title">Postoperatorio</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Postoperatorio')) ?>

<div class="formulario">

<form method="post">

<div class="col-md-6 col-sm-6">

  <div class="portlet paddingless">
    <div class="portlet-title line">
      <div class="caption"><i class="fa fa-info"></i>Detalles Postoperatorio</div>
    </div>

    <div class="row"> <!-- INICIO ROW 1 -->
        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['egreso']->hasError()) ?>">
                <label>Hora</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                  <div class="input-icon right">
                    <?php renderErrorIcon($form['egreso']) ?>
                    <input class="form-control timepickermr" placeholder="HH:MM" type="text" name="agenda[egreso]">
                  </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
                <div class="<?php echo getClasesCss($form['clasificacionqx']->hasError()) ?>">
                <?php echo $form['clasificacionqx']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-question"></i></span>
                    <div class="input-icon right">
                        <?php echo $form['clasificacionqx']->render(array('class' => 'form-control')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- FIN ROW 1-->

    <div class="row"> <!-- INICIO ROW 2 -->
        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['riesgoqx_id']->hasError()) ?>">
                <?php echo $form['riesgoqx_id']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
                    <div class="input-icon right">
                        <?php echo $form['riesgoqx_id']->render(array('class' => 'form-control')) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['eventoqx_id']->hasError()) ?>">
                <?php echo $form['eventoqx_id']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                    <div class="input-icon right">
                        <?php echo $form['eventoqx_id']->render(array('class' => 'form-control')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- FIN ROW 2-->

    <div class="row"> <!-- INICIO ROW 3 -->
        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['contaminacionqx_id']->hasError()) ?>">
                <?php echo $form['contaminacionqx_id']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lemon-o"></i></span>
                    <div class="input-icon right">
                        <?php echo $form['contaminacionqx_id']->render(array('class' => 'form-control')) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['destino_px']->hasError()) ?>">
                <?php echo $form['destino_px']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-send-o"></i></span>
                    <div class="input-icon right">
                        <?php echo $form['destino_px']->render(array('class' => 'form-control')) ?>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- FIN ROW 3 -->

    <div class="row"> <!-- INICIO ROW 4 -->
        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['ev_adversos_anestesia']->hasError()) ?>">
            <?php echo $form['ev_adversos_anestesia']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                    <?php echo $form['ev_adversos_anestesia']->render(array('class' => 'form-control')) ?>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['complicaciones']->hasError()) ?>">
            <?php echo $form['complicaciones']->renderLabel() ?>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-meh-o"></i></span>
                    <?php echo $form['complicaciones']->render(array('class' => 'form-control')) ?>
                </div>
            </div>
        </div>
    </div> <!-- FIN ROW 4 -->
  </div>
</div>

<?php //$formularios = $form->getEmbeddedForm('temporal')?>

<div class="col-sm-6 col-md-6">
    <div class="portlet paddingless tasks-widget">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-user-md"></i>Médicos que finalizan
        </div>
      </div>

      <div class="portlet-body">
        <div class="task-content">
          <div>
            <div class="scrollable">
              <ul class="task-list" id="listaDoctores">
                  <?php foreach ($form['temporal'] as $formulario):?>
                    <!-- <div ><?php echo $formulario['finaliza']->renderLabel($formulario['personal_nombre']->getValue()) ?></div> -->
                    <li>
                      <div class="task-checkbox">
                        <div>
                          <span><?php echo $formulario['finaliza'] ?></span>
                        </div>
                      </div>
                      <div class="task-title"><span class="task-title-sp"><?php echo $formulario['personal_nombre']->getValue() ?></span></div>
                      <div style="display:none" ><?php echo $formulario['personal_nombre'] ?></div>
                    </li>
                  <?php endforeach;?>
              </ul>
            </div>
          </div>
        </div>
        <input id="marcarTodosBtn" type="button" class="btn btn-link" value="Marcar todos" />
      </div>
    </div>
</div>

  <div class="form-actions-right">
    <?php echo $form->renderHiddenFields() ?>
    <input class="btn btn-primary btn-block" type="submit" value="Enviar">
  </div>

</form>

</div>

<script type="text/javascript">
    // marcar todos los médicos
    function marcarTodos() {
    $("#listaDoctores input[name*='agenda']").each(function(){
        $(this).parent().addClass('checked');
        $(this).prop('checked', true);
    });
}
</script>

<script type="text/javascript">
    $(function(){
        $('.scrollable').slimScroll({
            height: '250px'
        });

        $('.timepickermr').timepicker({
            showMeridian: true
        });

        $("#marcarTodosBtn").click(function(){
            marcarTodos()
        });

    });
</script>

