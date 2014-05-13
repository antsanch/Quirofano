<form action="<?php echo url_for('reportes/save') ?> ">


<table border="1">
<?php echo $form ?>
<tr>
  <th>Formulario</th>
  <td>
    <table border="1">
      <tr>
        <td colspan="2">
          <div class="label"><?php echo $filter['programacion']->renderLabel() ?></div>
          <div><?php echo $filter['programacion'] ?></div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="label"><?php echo $filter['medico_name']->renderLabel() ?></div>
          <div><?php echo $filter['medico_name'] ?></div>
        </td>
      </tr>
      <tr>
        <td width="80%">
          <div class="label"><?php echo $filter['quirofano_id']->renderLabel() ?></div>
          <div><?php echo $filter['quirofano_id'] ?></div>
        </td>
        <td>
          <div class="label"><?php echo $filter['totales']['quirofano_id']->renderLabel() ?></div>
          <div><?php echo $filter['totales']['quirofano_id'] ?></div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="label"><?php echo $filter['sala_id']->renderLabel() ?></div>
          <div><?php echo $filter['sala_id'] ?></div>
        </td>
        <td>
          <div class="label"><?php echo $filter['totales']['sala_id']->renderLabel() ?></div>
          <div><?php echo $filter['totales']['sala_id'] ?></div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="label"><?php echo $filter['servicio']->renderLabel() ?></div>
          <div><?php echo $filter['servicio'] ?></div>
        </td>
        <td>
          <div class="label"><?php echo $filter['totales']['servicio']->renderLabel() ?></div>
          <div><?php echo $filter['totales']['servicio'] ?></div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="label"><?php echo $filter['contaminacionqx_id']->renderLabel() ?></div>
          <div><?php echo $filter['contaminacionqx_id'] ?></div>
        </td>
        <td>
          <div class="label"><?php echo $filter['totales']['contaminacionqx_id']->renderLabel() ?></div>
          <div><?php echo $filter['totales']['contaminacionqx_id'] ?></div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="label"><?php echo $filter['tipo_proc_id']->renderLabel() ?></div>
          <div><?php echo $filter['tipo_proc_id'] ?></div>
        </td>
        <td>
          <div class="label"><?php echo $filter['totales']['tipo_proc_id']->renderLabel() ?></div>
          <div><?php echo $filter['totales']['tipo_proc_id'] ?></div>
        </td>
      </tr>

      <tr>
        <td>
          <div class="label"><?php echo $filter['atencion_id']->renderLabel() ?></div>
          <div><?php echo $filter['atencion_id'] ?></div>
        </td>
        <td>
          <div class="label"><?php echo $filter['totales']['atencion_id']->renderLabel() ?></div>
          <div><?php echo $filter['totales']['atencion_id'] ?></div>
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <div class="label"><?php echo $filter['causa_diferido_id']->renderLabel() ?></div>
          <div><?php echo $filter['causa_diferido_id'] ?></div>
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <div class="label"><?php echo $filter['reintervencion']->renderLabel() ?></div>
          <div><?php echo $filter['reintervencion'] ?></div>
        </td>
      </tr>

      <?php //echo $filter ?>
    </table>
  </td>
</tr>
<tr>
  <td colspan="2">
    <input type="submit" value="Guardar">
  </td>
</tr>
</table>
</form>
