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
</pre>

<script>
  $(function() {
    $('.datepicker').datepicker({ dateFormat: "dd-mm-yy" });
  });
</script>
