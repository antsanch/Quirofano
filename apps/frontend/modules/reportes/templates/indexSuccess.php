<?php use_stylesheet('/css/global/widescreen.css')?>
<?php //use_javascript('/EasyUI/jquery.easyui.min.js')?>
<?php //use_stylesheet('/EasyUI/themes/ProAzul/easyui.css')?>

<?php include_partial('form', array('filter' => $filter)) ?>

    <table border='1' width='100%'>
      <thead>
        <tr>
          <th>Id</th>
          <th>String</th>
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
          <td><?php echo $result ?></td>
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


<script>
  $(function() {
    $('.datepicker').datepicker({ dateFormat: "dd-mm-yy" });
  });
</script>
