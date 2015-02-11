<?php use_helper('agenda') ?>

<?php slot('titulo') ?>
  <title>Agenda de <?php echo $Quirofano['Nombre'] ?> | SIGA-HU </title>
<?php end_slot() ?>

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

<h3>Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h3>
<?php include_partial('qbreadcrumb', array('locacion' => $Quirofano['Nombre'])) ?>
<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>

<!-- @flag Inicio de la nueva tabla de resultados -->
<div id="camasPanel">
  <?php $currentStatus = null?>
  <table id="agenda" border="0" width="100%" cellspacing="0">
    <tbody>
    <?php foreach($Cirugias as $c): ?>
    <?php
      if($currentStatus != $c->getStatus()) {
        echo sprintf ("<tr><th colspan='11'><h3 style='padding-top: 11px;'>%s</h3></th></tr>", $c->getVerboseStatus());
        $currentStatus = $c->getStatus();
      }
    ?>
    <?php
              switch ($c->getStatus()) {
              case AgendaPeer::DIFERIDA_STATUS:
                echo renderProgramada($c);
                break;
              case AgendaPeer::PROGRAMADA_STATUS:
                echo renderProgramada($c);
                break;
              case AgendaPeer::TRANSOPERATORIO_STATUS:
                echo renderTransoperatorio($c);
                break;
              case AgendaPeer::REALIZADA_STATUS:
                echo renderRealizada($c);
                break;
              default:
                # No default
              }
            ?>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>