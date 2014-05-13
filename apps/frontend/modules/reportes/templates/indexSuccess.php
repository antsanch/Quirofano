<?php use_stylesheet('/min/?f=css/global/widescreen.css', '', array('raw_name' => true))?>
<?php use_stylesheet('/min/?f=EasyUI/themes/default/easyui.css', '', array('raw_name' => true))?>
<?php use_javascript('/EasyUI/jquery.easyui.min.js')?>

<div class="easyui-layout" data-options="fit:true" style="width:720px; height:700px; ">

  <!-- @flag Panel Izquierdo -->
  <div title="Menú" data-options="region:'west'" style="width:180px">
    <ul>
      <li>Cirugias por mes</li>
      <li>Cirugias por sala</li>
      <li>Cirugias por servicio</li>
      <li>Cirugias por tipo</li>
      <li>Cirugias por sala</li>
    </ul>
  </div>

  <!-- @flag Panel central -->
  <div title="Reporte" data-options="region: 'center'">

<?php if(isset($cirugias)): ?>
    <table border='1' width='100%'>
      <thead>
        <tr>
          <th>Id</th>
          <th>Quirofano</th>
          <th>Sala</th>
          <th>Médico</th>
          <th>Servicio</th>
          <th>Contaminacion</th>
          <th>Procedimiento</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach($cirugias as $result): ?>
        <tr>
          <td><?php echo $result->getId() ?></td>
          <td><?php echo $result->getQuirofano() ?></td>
          <td><?php echo $result->getSalaquirurgica() ?></td>
          <td><?php echo $result->getMedicoName() ?></td>
          <td><?php echo $result->getEspecialidad() ?></td>
          <td><?php echo $result->getContaminacionqx() ?></td>
          <td><?php echo $result->getProcedimiento() ?></td>
        </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
<?php else: ?>
  <p>Selecciona un filtro</p>
<?php endif; ?>

  </div>

  <!-- @flag Panel del filtro-->
  <div title="Filtro" data-options="region:'east', split:false, collapsed:true" style="width: 360px;">
<?php include_partial('form', array('filter' => $filter)) ?>
  </div>
</div>

<script>
  $(function() {
    $('.datepicker').datepicker({ dateFormat: "dd-mm-yy" });
  });
</script>
