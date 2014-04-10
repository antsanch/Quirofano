<form method="get">
  <table width="100%" border="1">
  <?php echo $filter ?>
  <tr>
    <td colspan="2">
      <input type="submit">
    </td>
  </tr>
  </table>
</form>
<pre>
<?php foreach($cirugias as $cx): ?>
  <?php print_r($cx->toJSON(false)) ?>

<?php endforeach; ?>
</pre>

