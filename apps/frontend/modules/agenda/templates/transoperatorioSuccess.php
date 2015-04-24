<?php use_helper("metronicForm") ?>
<?php slot('titulo') ?>
  <title>Transoperatorio | SIGA-HU </title>
<?php end_slot() ?>

<h3 class="page-title">Transoperatorio</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Transoperatorio')) ?>

<?php $quirofano = $form->getObject()->getQuirofano() ?>

<div class="portlet padingless">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-file"></i>
      Transoperatorio
      </div>
  </div>

  <div class="portlet-body form">
    <form method="post">
      <div class="form-body">
        <div class="row"> <!-- Inicio de la row 0 -->

          <div class='col-sm-6 col-md-2'>
            <div class="form-group">
              <label>Registro</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                <input class="form-control" placeholder="<?php echo $cirugia->getRegistro() ?>" readonly="">
              </div>
            </div>
          </div>

          <div class='col-sm-6 col-md-4'>
            <div class="form-group">
              <label>Nombre del paciente</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control" placeholder="<?php echo $cirugia->getPacienteName() ?>" readonly="">
              </div>
             </div>
           </div>

          <div class="col-sm-6 col-md-3">
            <div class="<?php echo getClasesCss($form['ingreso']->hasError()) ?>">
              <?php echo $form['ingreso']->renderLabel() ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['ingreso']) ?>
                  <?php echo $form['ingreso']->render(array('class' => 'form-control timepicker')); ?>
                </div>
              </div>
            </div>
          </div> 

          <div class="col-sm-6 col-md-3">
            <div class="<?php echo getClasesCss($form['tiempo_fuera']->hasError()) ?>">
              <?php echo $form['tiempo_fuera']->renderLabel() ?>
              <div class="input-group">
                <?php echo $form['tiempo_fuera']->render(array('class' => 'form-control')) ?>
              </div>
            </div>
          </div>
        </div> <!-- Inicio de la row 0 -->

        <div class="row"> <!-- Inicio de la row 1 -->
          <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['cxInicial']['personal_nombre']->hasError()) ?>">
              <?php echo $form['cxInicial']['personal_nombre']->renderLabel('Médico que inicia el procedimiento') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['cxInicial']['personal_nombre']) ?>
                  <?php echo $form['cxInicial']['personal_nombre']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['cxSupInicial']['personal_nombre']->hasError()) ?>">
              <?php echo $form['cxSupInicial']['personal_nombre']->renderLabel('Cirujano que supervisa') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['cxSupInicial']['personal_nombre']) ?>
                  <?php echo $form['cxSupInicial']['personal_nombre']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Fin de la row 1 -->

        <div class="row"> <!-- Inicio de la row 2 -->
          <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['anesInicia']['personal_nombre']->hasError()) ?>">
              <?php echo $form['anesInicia']['personal_nombre']->renderLabel('Anestesiólogo inicial') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['anesInicia']['personal_nombre']) ?>
                  <?php echo $form['anesInicia']['personal_nombre']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-6">
            <div class="<?php echo getClasesCss($form['anesSupInicia']['personal_nombre']->hasError()) ?>">
              <?php echo $form['anesSupInicia']['personal_nombre']->renderLabel('Anestesiólogo que supervisa') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['anesSupInicia']['personal_nombre']) ?>
                  <?php echo $form['anesSupInicia']['personal_nombre']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Fin de la row 2 -->

        <div class="row"> <!-- Inicio de la row 3 -->
          <div class="col-sm-12 col-md-12">
            <div class="<?php echo getClasesCss($form['anestesia_empleada']->hasError()) ?>">
              <?php echo $form['anestesia_empleada']->renderLabel() ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-caret-square-o-right"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['anestesia_empleada']) ?>
                  <?php echo $form['anestesia_empleada']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Fin de la row 3 -->


        <div class="row"> <!-- Inicio de la row 4 -->
          <div class="col-sm-6 col-md-4">
            <div class="<?php echo getClasesCss($form['instrumentistaInicial']['personal_nombre']->hasError()) ?>">
              <?php echo $form['instrumentistaInicial']['personal_nombre']->renderLabel('Instrumentista que inicia') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['instrumentistaInicial']['personal_nombre']) ?>
                  <?php echo $form['instrumentistaInicial']['personal_nombre']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-2">
            <div class="<?php echo getClasesCss($form['instrumentistaInicial']['turno']->hasError()) ?>">
              <?php echo $form['instrumentistaInicial']['turno']->renderLabel('Turno') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sun-o"></i></span>
                <div class="input-icon">
                <?php echo $form['instrumentistaInicial']['turno']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="<?php echo getClasesCss($form['circulanteInicial']['personal_nombre']->hasError()) ?>">
              <?php echo $form['circulanteInicial']['personal_nombre']->renderLabel('Circulante que inicia') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['circulanteInicial']['personal_nombre']) ?>
                  <?php echo $form['circulanteInicial']['personal_nombre']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-2">
            <div class="<?php echo getClasesCss($form['circulanteInicial']['turno']->hasError()) ?>">
              <?php echo $form['circulanteInicial']['turno']->renderLabel('Turno') ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sun-o"></i></span>
                <?php echo $form['circulanteInicial']['turno']->render(array('class' => 'form-control')); ?>
              </div>
            </div>
          </div>
        </div> <!-- Fin de la row 4 -->

        <div class="row"> <!-- Inicio de la row 5 -->
          <div class="col-sm-6 col-md-12">
            <div class="<?php echo getClasesCss($form['observaciones']->hasError()) ?>">
              <?php echo $form['observaciones']->renderLabel() ?>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-eye"></i></span>
                <div class="input-icon right">
                  <?php renderErrorIcon($form['observaciones']) ?>
                  <?php echo $form['observaciones']->render(array('class' => 'form-control')); ?>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- Fin de la row 5 -->

        <div class="form-actions right">
          <?php echo $form->renderHiddenFields() ?>
          <input type="submit" class="btn btn-primary" value="Programar">
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  $(function(){
    $("#agenda_anestesia_empleada").autocomplete({
      source: '<?php echo url_for('api/tipoanestesia', true)?>',
      select: function(event, ui) {
        $('#agenda_anestesia_id').val(ui.item.id);
      }
    });

    $('.personal_ac').each(function(){
      var $this = $(this),
          altField = $('#' + $this.attr('id').replace('personal_nombre', 'id'));

      $this.autocomplete({
        source: '<?php echo url_for('api/personal', true)?>',
        /*select: function(event, ui) {
          altField.val(ui.item.id);
        } /**/
      });
    });

  });
</script>

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

