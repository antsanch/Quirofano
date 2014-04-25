<?php
  $cirugias = $cirugias->getRawValue();
?>

<table border="1">
  <tr>
    <td width="50%" valign="top">
      <pre>
<?php print_r($cirugias) ?>
      </pre>
    </td>
    <td valign="top">
      <pre>
<?php echo $cirugias->getHora() ?>

<?php echo $cirugias->getHoraMostrar() ?>

<?php echo $cirugias->getRetrasoInicial('h:Yi') ?>

<?php echo $cirugias->getInicioTimestamp() ?>

<?php echo $cirugias->getClasses() ?>
</pre>
    </td>
  </tr>
</table>
