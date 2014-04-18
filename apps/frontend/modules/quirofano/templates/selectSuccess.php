<h2>Selecciona el quirofano que deseas usar</h2>
<table>
  <tbody>
<?php foreach($quirofano as $qx): ?>
    <tr>
      <td><a href="<?php echo url_for('quirofano/select?id='.$qx->getId()) ?>"><?php echo $qx ?></a></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>


