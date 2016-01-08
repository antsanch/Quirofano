<?php slot('titulo') ?>
  <title>Lista de Quirofanos Ambulatorios | SIGA-Qx </title>
<?php end_slot() ?>

  <h3 class="page-title">Lista de Quirofanos Ambulatorios</h3>

 <?php include_partial('qbreadcrumb', array('locacion' => 'Ambulatorios')) ?>

  <div class="tabbable tabbable-custom">

    <ul class="nav nav-pills nav-justified">
      <li><a href="<?php echo url_for('agenda/index')?>">Quirofano Activos</a></li>
      <li class="active"><a href="#">Ambulatorio</a></li>
      <li><a href="<?php echo url_for('agenda/tquirofanos')?>">Quirofanos Inactivos</a></li>
    </ul>

    <div class="tab-content">

      <div id="tab_activos" class="tab-pane active">
        <table class="table table-stripped">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Programar</th>
              <th>Diferidas</th>
              <th>Inspeccionar</th>
            </tr>
          </thead>
          <tbody>
<?php foreach ($Quirofanos as $Quirofano): ?>
            <tr>
              <td><a href="<?php echo url_for('agenda/show?slug='.$Quirofano->getSlug().'&date='.date('Y-m-d', strtotime("now")))?>"><?php echo $Quirofano->getNombre() ?></a></td>
              <td><a href="<?php echo url_for('agenda/validar?slug='.$Quirofano->getSlug())  ?>">Programar Cirugia</a></td>
              <td><a href="<?php echo url_for('agenda/diferidas?slug='.$Quirofano->getSlug())  ?>">Cirugias Diferidas</a></td>
              <td><a href="<?php echo url_for('agenda/inspeccionar?slug='.$Quirofano->getSlug())  ?>">Salas</a></td>
            </tr>
<?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
