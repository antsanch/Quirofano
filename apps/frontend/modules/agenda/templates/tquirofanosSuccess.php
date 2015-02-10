<?php slot('titulo') ?>
  <title>Lista de Quirofanos Inactivos | SIGA-HU </title>
<?php end_slot() ?>


  <h3 class="page-title">Lista de Quirofanos Inactivos</h3>
  <?php include_partial('qbreadcrumb', array('locacion' => 'Inactivos')) ?>


  <div class="tabbable tabbable-custom">

    <ul class="nav nav-pills nav-justified">
      <li class=""><a href="<?php echo url_for('agenda/index')?>">Quirofano Activos</a></li>
      <li><a href="<?php echo url_for('agenda/ambulatorio')?>">Ambulatorio</a></li>
      <li class="active "><a href="#">Quirofanos Inactivos</a></li>
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
              <td>Programar Cirugia</td>
              <td>Cirugias Diferidas</td>
              <td>Salas</td>
            </tr>
  <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
