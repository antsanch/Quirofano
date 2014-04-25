<?php
  $widget = $widget->getRawValue();
  $widget->setDefault(time());
  //echo $widget->getDefault();
?>
<form>
<table border='1'>
  <tr>
    <td style="vertical-align: top;">
      <pre>
<?php echo $widget->render('programacion', '28-10-1977 04:15') ?>
<?php echo $widget->render('programacion', strtotime('28-10-1977 04:15')) ?>
<?php echo $widget->render('programacion', 'Antonio') ?>
<?php echo $widget->render('programacion', null) ?>
<?php echo $widget->render('programacion', (string) strtotime('28-10-1977 04:15')) ?>
<?php echo $widget->render('programacion', array('year' => '1977', 'month' => '10', 'day' => '28', 'hour' => '4', 'minute' => '15', 'second' => '42')) ?>
<?php //print_r($widget->getAttributes())?>
      </pre>
    <?php echo $text ?>
    <?php echo htmlentities($text) ?>
    <hr/>
    <?php
      //~ $test = new sfWidgetFormInputText(array('label' => 'inputText:', 'type' => 'text'), ['data-test' => 'valor']);
      //~ echo $test->render('InputText', date('h:i'));
      //~ echo htmlentities($test->render('InputText', date('h:i')));
      ?>
    <hr />
      <input type='submit' value="Enviar">
    </td>
  </tr>
</table>
</form>
