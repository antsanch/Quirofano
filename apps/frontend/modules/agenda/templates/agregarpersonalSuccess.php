<?php use_helper("metronicForm") ?>
<?php slot('titulo')?>
  <title>Agregar personal | SIGA - HU</title>
<?php end_slot() ?>

<h3 class="page-title">Agregar personal</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Agregar personal')) ?>


<div class="row">
  <div class="col-sm-6 col-md-6">
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-file"></i> Agregar Personal
        </div>
      </div>
      <div class="portlet-body form formulario">
        <form method="post">
          <div class="form-body">
            <div class="row">
              <div class="col-sm-6 col-md-12">
                <div class="<?php echo getClasesCss($form['personal_nombre']->hasError()) ?>">
                  <?php echo $form[ 'personal_nombre']->renderLabel() ?>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-md"></i>
                    </span>
                    <div class="input-icon right">
                      <?php renderErrorIcon($form[ 'personal_nombre']) ?>
                      <?php echo $form[ 'personal_nombre']->render(array('class' => 'form-control')) ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-12">
                <div class="<?php echo getClasesCss($form['tipo']->hasError()) ?>">
                  <?php echo $form[ 'tipo']->renderLabel() ?>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-file-text-o"></i>
                    </span>
                    <div class="input-icon right">
                      <?php echo $form[ 'tipo']->render(array('class' => 'form-control')) ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="<?php echo getClasesCss($form['status']->hasError()) ?>">
                  <?php echo $form[ 'status']->renderLabel() ?>
                  <div class="input-group">
                    </span>
                    <div class="input-icon right">
                      <?php echo $form[ 'status']->render(array('class' => 'form-control')) ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-md-6">
                <div class="<?php echo getClasesCss($form['turno']->hasError()) ?>">
                  <?php echo $form[ 'turno']->renderLabel() ?>
                  <div class="input-group">
                    </span>
                    <div class="input-icon right">
                      <?php echo $form[ 'turno']->render(array('class' => 'form-control')) ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-actions right">
              <?php echo $form->renderHiddenFields() ?>
              <input class="btn btn-primary btn-block" type="submit" value="Agregar">
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-6">
    <div class="portlet paddingless">
      <div class="portlet-title line">
        <div class="caption"><i class="fa fa-user-md"></i>Personal actual</div>
      </div>

      <div class="tab-content">
        <div>
          <div id="scrollable">
            <?php foreach ($cirugia->getPersonalTransoperatorio() as $key => $medico): ?>
            <div class='row'>
              <div class="col-md-6 ">
                <div class="details">
                  <div>
                    <a href="#">
                      <?php echo ucfirst($medico) ?>
                    </a>
                  </div>
                  <div>
                    <?php echo ucfirst($medico->getTipo()) ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="panel-group accordion" id="acordDetalles">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#acordDetalles" href="#collapseDetallesProg" aria-expanded="false">
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

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script>
$(function(){
    $('#scrollable').slimScroll({
        height: '250px'
    });
});
</script>

<script>
  $(function(){

    $('.personal_ac').each(function(){
      var $this = $(this),
          altField = $('#' + $this.attr('id').replace('personal_nombre', 'id'));

      $this.autocomplete({
        source: '<?php echo url_for('api/personal', true)?>',
          /*select: function(event, ui) {
          altField.val(ui.item.id);
        }/**/
      });
    });

  });
</script>

 <script>
(function($){
  var
    esp = $('#personalcirugia_especialidad_id, label[for="personalcirugia_especialidad_id"]' ).hide(),
    $status = $('#personalcirugia_status, label[for="personalcirugia_status"]').hide(),
    turno = $('#personalcirugia_turno, label[for="personalcirugia_turno"]').hide();

   var
   s_ayudante = $("#personalcirugia_status option[value=0]"),
   s_supervisor = $("#personalcirugia_status option[value=1]"),
   s_circulante = $("#personalcirugia_status option[value=2]"),
   s_instrumentista = $("#personalcirugia_status option[value=3]");

  $('#personalcirugia_tipo').bind('change', function(){
    var tipoPersonal = $("#personalcirugia_tipo");
    //console.log(tipoPersonal.val());

    switch (tipoPersonal.val()) {

      case "cirujano":
        esp.show();
        $status.show();
        turno.hide();
      s_ayudante.show();
      s_supervisor.show();
      s_circulante.hide();
      s_instrumentista.hide();
        break;

      case "anestesista":
        esp.hide();
        $status.show();
        turno.hide();
      s_ayudante.show();
      s_supervisor.show();
      s_circulante.hide();
      s_instrumentista.hide();
        break;

      case "enfermeria":
        esp.hide();
        $status.show();
        turno.show();
      s_ayudante.hide();
      s_supervisor.hide();
      s_circulante.show();
      s_instrumentista.show();

        break;

      default:
        esp.show();
        $status.show();
        turno.show();
      s_ayudante.show();
      s_supervisor.show();
      s_circulante.show();
      s_instrumentista.show();
    }

  });
})(jQuery);
</script>
<script>
  $(function() {
    $('textarea').elastic();

    $('.searchable').each(function() {
      var $this = $(this),
          source = '<?php echo url_for('@homepage', true)?>' + $this.data('url'),
          focus = $this.attr('id'),
          select = $this.data('select');

      $this.autocomplete({
      minLength: 2,
      delay: 350,
      source: source,
      focus: function(event, ui) {
        $this.val(ui.item.value);
        return false;
      },
      select: function(event, ui) {
        $(select).val(ui.item.id)
      }
      })

    });
 });
</script>