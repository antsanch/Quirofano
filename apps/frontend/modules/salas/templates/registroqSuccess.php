<h3>Registrar Quirofano</h3>
<ul class="page-breadcrumb breadcrumb">
    <li class="btn-group">
    </li>
    <li>
      <i class="fa fa-home"></i>
      <a href="/index.php/ ">Inicio</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      <a href="/salas/registroq ">Registrar Quirofano</a>
    </li>
    <li> <?php echo $Quirofano['Nombre'] ?></li>
</ul>

<?php include_partial('registroqForm', array('form' => $form)) ?>
