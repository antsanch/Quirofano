<h3 class="page-title">Cancelar cirugía</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Cancelar cirugía')) ?>

<div class="alert alert-danger">
	<p>¿Estas seguro que deseas cancelar esta cirugía?</p>
</div>

<form action="<?php echo url_for('agenda/cancelar?id='.$cirugia->getId() )?>" method="post">
  <a class="btn btn-link" href="<?php echo url_for('agenda/show?slug='.$cirugia->getQuirofano()->getSlug())?>">Regresar a la agenda</a>
  <input type="submit" class="btn btn-primary" value="Cancelar cirugía">
</form>
