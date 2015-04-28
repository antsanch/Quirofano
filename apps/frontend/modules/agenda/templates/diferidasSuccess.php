<?php use_stylesheet('global/styleAgenda.css') ?>
<?php use_helper('agenda') ?>

<?php slot('titulo') ?>
  <title>Agenda de <?php echo $Quirofano['Nombre'] ?> | SIGA-HU </title>
<?php end_slot() ?>

<h3>Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Cirugías diferidas')) ?>
<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>

<!--Script para mostrar alertas-->
<script type="text/javascript">
function saludo() {alert('Programación Exitosa')}
function verificar() {alert('Verificar la hora')}
</script>

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

<div class="table-responsive">
	<table id="agenda" class="table table-hover">
    	<tbody>
		<?php foreach($Cirugias as $c): ?>
			<?php if ($c->getCancelada() != 1): ?>
			<?php if ($c->getStatus() != $title): ?>
			<?php echo print_head($c->getVerboseStatus()) ?>
		  	<?php $title = $c->getStatus() ?>
			<?php endif; ?>
		<?php echo renderDiferida($c); ?>
		<?php endif; ?>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
$(function () {
  $('[data-toggle="popover"]').popover({
    trigger: 'hover',
    html: true, 
    delay: { "show": 0, "hide": 1 },
    placement: 'auto top'
  });
});
</script>
