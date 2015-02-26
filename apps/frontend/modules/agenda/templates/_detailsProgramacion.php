<!-- Mostrar los avisos en un solo div, quizas se pueda hacer mejor con la ayuda de un helper -->
<?php 
  $avisos = array();
  if ($cirugia->estaSolicitado() && $cirugia->getStatus() == 1) {
    array_push($avisos, "<p>- Este paciente <strong>YA</strong> esta en preoperatorio.</p>");
  }
  if($cirugia->tieneRetraso()) {
    array_push($avisos, "<p>- Esta cirugia tiene {$cirugia->getRetrasoInicial('format')} de retraso.</p>");
  }

  if (count($avisos)) {
    echo "<div class='alert alert-danger'>";
    foreach($avisos as $aviso)
      echo $aviso;
    echo "</div>";
  }
?>

<div class="tab-pane active" id="detallesProg">
 <div class="head">
    <?php if ($cirugia->getStatus() == 1) echo link_to('<div class="iniciar" style="float:right;"></div>', 'agenda/transoperatorio?id='.$cirugia->getId(), array('title' => 'Iniciar esta cirugia')) ?>
    <?php if ($cirugia->getStatus() == -50) echo link_to('<div class="modificar" style="float:right;" ></div>', 'agenda/reprogramar?id='.$cirugia->getId(), array('title' => 'Reprogramar')) ?>
    <h3>Detalles de la Programación</h3>
  </div>

  <!-- Primer renglon -->
  <div class="row">
    <div class='col-md-3'>
      <div class="form-group">
        <label>Quirofano</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getQuirofano() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Sala</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-h-square"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getSalaquirurgica() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-3'>
      <div class="form-group">
        <label>Fecha programada</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getProgramacion('d-M-Y') ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Hora</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getHora('H:i') ?>" readonly="">
        </div>
      </div>
    </div>

     <div class='col-md-2'>
      <div class="form-group">
        <label>Duración</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-dashboard"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getTiempoEst() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

  <!-- Segundo renglon -->
  <div class="row">
    <div class='col-md-4'>
      <div class="form-group">
        <label>Nombre del paciente</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getPacienteName() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Genero</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-group"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getGenero() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Edad</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-child"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getEdad() ?>" readonly="">
        </div>
      </div>
    </div>
    <div class='col-md-4'>
      <div class="form-group">
        <label>Procedencia</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
          <input class="form-control" placeholder="<?php echo $cirugia->getProcedencia() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

  <!-- Tercer renglon -->
  <div class="row">
      <div class='col-md-2'>
        <div class="form-group">
          <label>Registro</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getRegistro() ?>" readonly="">
          </div>
        </div>
      </div>

      <div class='col-md-3'>
        <div class="form-group">
          <label>Tipo de Procedimiento</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-check-square-o"></i></span>
            <input class='form-control' placeholder="<?php echo $cirugia->getProcedimiento() ?>" readonly="">
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="form-group">
          <label>Especialidad</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-medkit"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getEspecialidad() ?>" readonly="">
          </div>
        </div>
      </div>

      <div class='col-md-2'>
        <div class="form-group">
          <label>Diagnostico</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-stethoscope"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getDiagnostico() ?>" readonly="">
          </div>
        </div>
      </div>
  </div>

  <!-- Cuarto Renglon -->
  <div class="row">
      <div class='col-md-4'>
        <div class="form-group">
          <label>Médico que programa</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getMedicoPrograma() ?>" readonly="">
          </div>
        </div>
      </div>

      <div class='col-md-2'>
        <div class="form-group">
          <label>Protocolo</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-file-text-o"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getProtocoloText() ?>" readonly="">
          </div>
        </div>
      </div>

      <div class='col-md-2'>
        <div class="form-group">
          <label>Reintervención</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getReintervencionText() ?>" readonly="">
          </div>
        </div>
      </div>

      <div class='col-md-2'>
        <div class="form-group">
          <label>En atención a</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-chain"></i></span>
            <input class="form-control" placeholder="<?php echo $cirugia->getAtencion() ?>" readonly="">
          </div>
        </div>
      </div>
  </div>

  <!-- Penultimo Renglon -->
  <div class="row">
      <div class='col-md-4'>
        <div class="form-group">
          <label>Riesgo quirurgico</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-warning"></i></span>
            <textarea class="form-control" placeholder="<?php echo $cirugia->getRiesgoQxPre() ?>" readonly=""></textarea>
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="form-group">
          <label>Insumos indispensables</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-eye"></i></span>
            <textarea class="form-control" placeholder="<?php echo $cirugia->getReqInsumos() ?>" readonly=""></textarea>
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="form-group">
          <label>Requerimientos de Anestesiología</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-smile-o"></i></span>
            <textarea class="form-control" placeholder="<?php echo $cirugia->getReqAnestesico() ?>" readonly=""></textarea>
          </div>
        </div>
      </div>
  </div>

  <!-- Último Renglon -->
  <div class="row">
    <div class='col-md-4'>
        <div class="form-group">
          <label>Hemoderivados Necesarios</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-tint"></i></span>
            <textarea class="form-control" placeholder="<?php echo $cirugia->getReqHemoderiv() ?>" readonly=""></textarea>
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="form-group">
          <label>Laboratorio</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-flask"></i></span>
            <textarea class="form-control" placeholder="<?php echo $cirugia->getReqLaboratorio() ?>" readonly=""></textarea>
          </div>
        </div>
      </div>

      <div class='col-md-4'>
        <div class="form-group">
          <label>Otros insumos</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-plus"></i></span>
            <textarea class="form-control" placeholder="<?php echo $cirugia->getRequerimiento() ?>" readonly=""></textarea>
          </div>
      </div>
  </div>
</div>

<?php if($cirugia->countAgendaVersions() > 1): ?> <!-- mayor a uno para que no se muestre la version 1 --> 
    <div>
      Historial de cambios
    </div>

<?php # @todo Revisar como obtener los valores relacionados y no solo el id sin matar la BD con request
foreach($cirugia->getAgendaVersions() as $version): ?>
    <div class='col-md-3'>
      <div>Quirofano</div>
      <div class='value'><?php // echo $version->getQuirofano() ?></div>
    </div>

    <div class='col-md-2'>
      <div>Sala</div>
      <div class='value'><?php // echo $version->getSalaquirurgica() ?></div>
    </div>

    <div class='col-md-3'>
      <div>Tipo de Procedimiento</div>
      <div class='value'><?php // echo $version->getProcedimiento() ?> </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Fecha programada</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          <input class="form-control" placeholder="<?php echo $version->getProgramacion('d-M-Y') ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Hora</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
          <input class="form-control" placeholder="<?php echo $version->getHora('H:i') ?>" readonly="">
        </div>
      </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>
 </div>
