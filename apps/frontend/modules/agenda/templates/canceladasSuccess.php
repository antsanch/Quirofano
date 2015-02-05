<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>
<div id="camasPanel">
</div>

<!--
<table id="agenda" border="0" width="100%" cellspacing="0">

    Script para mostrar alertas
    <script type="text/javascript">
    function saludo() {alert('Programación Exitosa')}
    function verificar() {alert('Verificar la hora')}
    </script>

    Mostrar alertas
    <?php if ($sf_user->hasFlash('notice')): ?>
    <?php if ($sf_user->getFlash('notice') == 'Verificar la hora' ):?>

    <script type="text/javascript">
    function start() {verificar()}
    window.onload = start;
    </script>

    <?php else: ?>
      <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>

    <script type="text/javascript">
    function start() {saludo()}

    window.onload = start();
    </script>
    <?php endif; ?>
    <?php endif; ?>
    </table>
-->

<?php foreach($Cirugias as $cirugia): ?>
  <?php echo print_head() ?>
  <?php include_partial('agendaQuirofano', array('cirugia' => $cirugia, 'slug' => $Quirofano->getSlug())) ?>
<?php endforeach; ?>