<style>
  .cxrow td{
    background: white;
    border-bottom: 1px solid black;
    margin: 1px 0px;
  }

  .realizadas td{
    background: lightblue;
  }

  .transoperatorio td{
    background: lightgreen;
  }

  .atrasada td {
    background: red;
    color: white;
  }
</style>

<div class="formulario clearfix">
<h1 style="color:#FFFFFF;">Programar Cirugia</h1>
  <form action="<?php echo url_for('agenda/validar') ?> " method="get">
    <div class="area cols12">
      <div class="label">Datos del paciente</div>
      <div class="field">
        <input id="search" name="search" type="text" value="<?php echo $search ?>" placeholder="Registro o nombre">
      </div>
    </div>

<?php if(isset($cirugias)): // Se ha definido la variable cirugias ?>
    <div class="area cols12">
<?php if($cirugias->count() > 0):  // Hay una o mas cirugias previas ?>
    <p><a href="<?php echo url_for('agenda/programar') ?> ">Programar cirugia </a></p>
      <table id="results" width="100%" border="0" cellspacing="0">
<?php foreach($cirugias as $cx): ?>
        <tr class="<?php echo $cx->getClasses() ?>">
          <td><input type="radio" name="cirugia" value="<?php echo $cx->getId() ?>"></td>
          <td><?php echo $cx->getRegistro() ?> </td>
          <td><?php echo $cx->getPacienteName() ?> </td>
          <td><?php echo $cx->getLastTime('d-m-Y H:i') ?> </td>
          <td><?php echo $cx->getDiagnostico() ?> </td>
          <td><?php echo $cx->getEspecialidad() ?> </td>
<?php switch($cx->getStatus()): ?>
<?php case -50 ?>
<?php case 1 ?>
          <td><a href="<?php echo url_for('agenda/reprogramar?id='.$cx->getId()) ?>">Reprogramar</a></td>
<?php break ?>
<?php case 10?>
          <td>En cirugia</td>
<?php break ?>
<?php case 100?>
          <td><a href="<?php echo url_for(sprintf('agenda/programar?slug=%s&cx=%s',$cx->getQuirofanoSlug(), $cx->getId())) ?>">Reintervenir</a></td>
<?php endswitch; ?>
<!--
          <td><?php echo $cx->getStatus() ?> </td>
          <td><?php echo $cx->getClasses() ?> </td>
-->
        </tr>
<?php endforeach; ?>
      </table>
<?php else: // No se encontraron cirugias en el historial del paciente?>
  <p>No se han encontrado cirugias para ese paciente, puedes usar otro termino de busqueda como nombre completo, apellidos o registro</p>
  <p>Tambien puedes <a href="<?php echo url_for('agenda/programar') ?> ">programar una nueva cirugia </a></p>
<?php endif; ?>
    </div>
<?php endif; ?>
    <div class="area control">
      <div><input type="submit" value="Validar"></div>
    </div>
  </form>
</div>

<script>
  $('#results').on('click', 'tr', function() {
    $(this).find('input').attr('checked', true);
    console.log($(this).find('input'));
  });
</script>
