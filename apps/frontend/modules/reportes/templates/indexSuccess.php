<?php use_stylesheet('/css/global/widescreen.css')?>
<?php use_javascript('/EasyUI/jquery.easyui.min.js')?>
<?php use_stylesheet('/EasyUI/themes/ProAzul/easyui.css')?>

<div class="0easyui-layout" data-options="fit:true" style="">
  <div data-options="region:'west', collapsible:true, split:true" title="Menú" style="width: 150px">
    Izquierda
  </div>

  <div data-options="region:'center', collapsible:false, split:false" title="Reporte" style="">
    <p>Descargar</p>
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

  </div>

  <!-- @flag Panel Inferior (Sur)-->
  <div data-options="region:'south', collapsible:true, split:false" title="Filtros" style="height:350px">

    <form method='GET'>
    <table>
      <tbody>
    <?php echo $filter ?>
      <tr>
        <td colspan='2'>
          <input type='submit' value='Buscar Registros'>
          <input type='reset' value='Limpiar Campos'>
        </td>
      </tr>
      </tbody>
    </table>
    </form>

  </div>

</div>

<script>
  $(function() {
    $('.datepicker').datepicker({ dateFormat: "dd-mm-yy" });
  });
</script>
