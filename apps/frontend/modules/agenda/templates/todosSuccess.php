<h3>Agenda de procedimientos en <?php echo $Quirofano['Nombre'] ?></h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Cirugías del mes')) ?>
<?php include_partial('menuShow', array('Cirugias' => $Cirugias, 'Quirofano' => $Quirofano, "date" => $date)) ?>
