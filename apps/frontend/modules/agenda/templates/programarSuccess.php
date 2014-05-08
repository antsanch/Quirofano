<html>
<script type="text/javascript" src="/js/global/jquery.ptTimeSelect.js"></script>    <!-- 1.8.2 -->
<link rel="stylesheet" type="text/css" href="/css/global/jquery.ptTimeSelect.css" />
<style>
/* Mientras podemos hacer botones con jQueryUI usamos css */

.menubar a {
  background: white;
  border: 1px solid black;
  color: blue;
  margin: 0 0 3px 0;
  padding: 2px 4px;
  text-decoration: none;
}

.menubar a:hover {
  background: lightgray;
}
</style>
  <!--
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> <!---->

<div class="menubar">
  <a href="<?php echo url_for('agenda/show?slug='.$quirofano['Slug']) ?>">Agenda de <?php echo $quirofano['Nombre'] ?></a>
</div>

<div class="formulario clearfix">
<h1 style="color:#FFFFFF;">Programar Cirugia</h1>
<?php include_partial('programarForm', array('form' => $form, 'Quirofano' => $quirofano)) ?>
</div>

</html>
