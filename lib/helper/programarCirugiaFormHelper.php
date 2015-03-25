<?php
/*
* Esta funcion arroja una string con las clases que debe de tener un div
* para que el input se muestre con error. Si hay error las clases para
* este en metronic es has-error y si no hay error,
* pues nada más form control para que quede como input normal
* si se cambia de framework para la vista esta funcion no creo que
* tenga sentido
*/
  function getClasesCSS($e) {
    return $e ? 'form-group has-error' : 'form-group';
  }

/*
* Con esta funcion renderizamos un icono en el lado derecho del input
* cuando se pasa el puntero por encima del icono una tooltip mostrara 
* el erroi
* Los parametros que requiere es el objeto $form['campo']
*/
function renderErrorIcon($campo) {
  $html = "";
  if ($campo->hasError()) {
    $html = "<i class='fa fa-warning' data-toggle='tooltip' data-placement='auto left' data-container='form' data-title='{$campo->getError()}'></i>";
  }
  echo $html;
}