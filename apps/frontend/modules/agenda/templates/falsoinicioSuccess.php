<?php $cx = $form->getObject() ?>

Status: <?php echo $cx->getStatus() ?>

<?php include_partial('detailsTransoperatorio', array('cirugia' => $cx)) ?>

<pre>
  <table>
    <tr>
      <td valign='top'><?php print_r($cx) ?></td>
      <td valign='top'><?php print_r($cx->resetTransoperatorio()) ?></td>
    </tr>
  </table>

</pre>
<?php $cx->resetTransoperatorio() ?>
<?php include_partial('detailsTransoperatorio', array('cirugia' => $cx)) ?>
