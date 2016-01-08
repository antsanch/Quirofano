<h3 class="page-title">Falso inicio</h3>
<?php include_partial('qbreadcrumb', array('locacion' => 'Falso inicio')) ?>
<?php include_partial('detailsTransoperatorio', array('cirugia' => $cx)) ?>

<form method="post">
<table>
  <tr>
    <td valign="top"><?php echo $form['aceptacion'] ?> </td>
    <td><?php echo $form['aceptacion']->renderLabel() ?> </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" class="btn btn-primary" name="button" value="Aceptar">
      <input type="submit" class="btn btn-secondary" name="button" value="Cancelar">
      <?php echo $form->renderHiddenFields() ?>
    </td>
  </tr>
</table>
</form>

<?php $cx->resetTransoperatorio() ?>
