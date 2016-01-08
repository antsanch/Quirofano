<?php slot('titulo') ?>
  <title>Reprogramar cirugía | SIGA-Qx </title>
<?php end_slot() ?>

<h3 class="page-title">Reprogramar cirguía</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Reprogramar')) ?>
<?php include_partial('programarForm', array('form' => $form))?>