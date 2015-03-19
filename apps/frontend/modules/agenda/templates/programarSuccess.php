<?php slot('titulo') ?>
  <title>Programar Cirugía | SIGA-Qx </title>
<?php end_slot() ?>

<h3 class="page-title">Programar cirugía</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Programar')) ?>

<?php include_partial('programarForm', array('form' => $form, 'Quirofano' => $quirofano)) ?>
