<?php use_stylesheet('/css/global/widescreen.css')?>
<?php use_stylesheet('/css/global/styleAgenda.css')?>
<?php use_javascript('/js/global/facebox.js')?>
<?php use_stylesheet('/css/global/facebox.css')?>

<?php slot('titulo') ?>
  <title>Agenda de <?php echo $Quirofano['Nombre'] ?> | SIGA-HU </title>
<?php end_slot() ?>

<h1>Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h1>

<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>


<div id="camasPanel">
  <table id="agenda" border="0" width="100%" cellspacing="0">
</div>

<!--Script para mostrar alertas-->
<script type="text/javascript">
function saludo() {alert('Programación Exitosa')}
function verificar() {alert('Verificar la hora')}
</script>
<!--Script para mostrar alertas-->

<!--Mostrar alertas-->
<?php if ($sf_user->hasFlash('notice')): ?>
<?php if ($sf_user->getFlash('notice') == 'Verificar la hora' ):?>

<script type="text/javascript">
function start() {verificar()}
window.onload = start;
</script>

<?php else: ?>
   <!-- <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>-->

<script type="text/javascript">
function start() {saludo()}

window.onload = start;
</script>

<?php endif; ?>
<?php endif; ?>

<!-- Mostrar alertas-->
<?php $title = null ?>
<?php foreach($Cirugias as $cirugia): ?>

<?php if ($cirugia->getCancelada() != 1): ?>
<?php if ($cirugia->getStatus() != $title): ?>
  <td colspan="11"><h3 style="padding-top: 11px;"><?php echo $cirugia->getVerboseStatus() ?></h3></td>
  <?php echo print_head() ?>
  <?php $title = $cirugia->getStatus() ?>
<?php endif; ?>
<?php include_partial('agendaQuirofano', array('cirugia' => $cirugia, 'slug' => $Quirofano['Slug'])) ?>
<?php endif; ?>
<?php endforeach; ?>


<!-- agregado -->

</table>


<script>
  $(function(){
    $('#datepicker').datepicker({
      dateFormat: 'dd-mm-yy'
    });


  /*  $('a[rel*=facebox]').facebox({
      overlay: true,
      opacity: 0.75
    }); /**/
  });
</script>
