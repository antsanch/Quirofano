<?php use_stylesheet('/css/global/widescreen.css')?>

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

<table border='1'>
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

<pre>
<?php

  $filter->buildCriteria(
    array(
      'programacion' => array(
        'from' =>'2014-04-11',
        'to' => '2014-04-12'
      ),
      'status'  => AgendaPeer::PROGRAMADA_STATUS
    )
  )//->find()
?>

<?php //print_r(get_class_methods($filter)) ?>

<?php if (isset($array)) echo serialize(array('agenda_filters' => $array->getRawValue())) ?>
<?php if (isset($array)) print_r($array->getRawValue()) ?>
</pre>

<script>
  $(function() {
    $('.datepicker').datepicker({ dateFormat: "dd-mm-yy" });
  });
</script>
