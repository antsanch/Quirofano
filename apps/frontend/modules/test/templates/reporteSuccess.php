<pre>
<table border="1">
  <thead>
    <tr>
      <td>Id</td>
      <td>Fecha</td>
      <td>Sala</td>
<!--
      <td>Servicio</td>
-->
      <td>Cantidad</td>
    </tr>
  </thead>
  <tbody>
<?php foreach($cirugias as $c): ?>
    <tr>
<!--
      <td><?php print_r($c) ?></td>
-->
      <td><?php echo $c->getId() ?> </td>
      <td><?php echo $c->getProgramacion('d-m-Y H:i') ?> </td>
      <td><?php echo $c->getSalaName() ?> </td>
      <td><?php //echo $c->getEspecialidadName() ?> </td>
      <td><?php echo $c->getCountSala() ?> </td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>

<?php //print_r(get_class_methods($cirugias->getFirst()->getRawValue() ))?>
</pre>
