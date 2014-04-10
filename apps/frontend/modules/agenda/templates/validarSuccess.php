<style>
  .cxrow td{
    background: pink;
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

<?php if(isset($cirugias)): ?>
    <div class="area cols12">
      <table width="100%">
<?php foreach($cirugias as $cx): ?>
        <tr class="<?php echo $cx->getClasses() ?>">
          <td><input type="radio" name="cirugia" value="<?php echo $cx->getId() ?>"></td>
          <td><?php echo $cx->getRegistro() ?> </td>
          <td><?php echo $cx->getPacienteName() ?> </td>
          <td><?php echo $cx->getLastTime('d-m-Y H:i') ?> </td>
          <td><?php echo $cx->getEspecialidad() ?> </td>
          <td><?php echo $cx->getDiagnostico() ?> </td>
          <td><?php echo $cx->getStatus() ?> </td>
          <td><?php echo $cx->getClasses() ?> </td>
        </tr>
<?php endforeach; ?>
      </table>
    </div>
<?php endif; ?>

    <div class="area control">
      <div><input type="submit" value="Validar"></div>
    </div>
  </form>
</div>

