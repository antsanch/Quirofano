<div class="formulario" style="margin: auto; overflow: auto; width: 720px;" >
  <h1>Filtro</h1>
  <form method='GET'>

    <div class="area cols04">
      <div class="label"><?php echo $filter['quirofano_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['quirofano_id'] ?>
      </div>
    </div>

    <div class="area cols02">
      <div class="label"><?php echo $filter['totales']['quirofano_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['quirofano_id'] ?>
      </div>
    </div>

    <div class="area cols04">
      <div class="label"><?php echo $filter['sala_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['sala_id'] ?>
      </div>
    </div>

    <div class="area cols02">
      <div class="label"><?php echo $filter['totales']['sala_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['sala_id'] ?>
      </div>
    </div>

    <div class="area cols06">
      <div class="label"><?php echo $filter['programacion']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['programacion'] ?>
      </div>
    </div>

    <div class="area cols04">
      <div class="label"><?php echo $filter['servicio']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['servicio'] ?>
      </div>
    </div>

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
