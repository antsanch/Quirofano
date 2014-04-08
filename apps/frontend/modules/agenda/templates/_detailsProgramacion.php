<?php if ($cirugia->estaSolicitado() && $cirugia->getStatus() == 1): ?>
  Este paciente YA esta en preoperatorio
<?php endif; ?>

  <div title="Programación" class="tableData program detail clearfix" >
    <div class="head">
      Datos de la programacion de la cirugia
    </div>

<?php if($cirugia->tieneRetraso()): ?>
    <div class="cellData cols12" >
      <div class="value" >Esta cirugia tiene <?php echo $cirugia->getRetrasoInicial('format') ?> de retraso</div>
    </div>
<?php endif; ?>

    <div class='cellData cols02'>
      <div class='label'>Quirofano</div>
      <div class='value'><?php echo $cirugia->getQuirofano() ?></div>
    </div>

    <div class='cellData cols01'>
      <div class='label'>Sala</div>
      <div class='value'><?php echo $cirugia->getSalaquirurgica() ?></div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Tipo de Procedimiento</div>
      <div class='value'><?php echo $cirugia->getProcedimiento() ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Fecha programada</div>
      <div class='value'><?php echo $cirugia->getProgramacion('d-M-Y') ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Hora</div>
      <div class='value'><?php echo $cirugia->getHora('h:i A') ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Duración</div>
      <div class='value'><?php echo $cirugia->getTiempoEst() ?> </div>
    </div>

    <div class='cellData cols08'>
      <div class='label'>Nombre del Paciente</div>
      <div class='value'><?php echo $cirugia->getPacienteName() ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Registro</div>
      <div class='value'><?php echo $cirugia->getRegistro() ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Edad</div>
      <div class='value'><?php echo $cirugia->getEdad() ?> </div>
    </div>

  <!-- Tercer Renglon -->
    <div class='cellData cols04'>
      <div class='label'>Genero</div>
      <div class='value'><?php echo $cirugia->getGenero() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Procedencia</div>
      <div class='value'><?php echo $cirugia->getProcedencia() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Especialidad</div>
      <div class='value'><?php echo $cirugia->getEspecialidad() ?> </div>
    </div>

  <!-- Cuarto Renglon -->
    <div class='cellData cols04'>
      <div class='label'>Diagnostico</div>
      <div class='value'><?php echo $cirugia->getDiagnostico() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Protocolo</div>
      <div class='value'><?php echo $cirugia->getProtocoloText() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Reintervención</div>
      <div class='value'><?php echo $cirugia->getReintervencionText() ?> </div>
    </div>

  <!-- Quinto Renglon -->
    <div class='cellData cols08'>
      <div class='label'>Médico que programa</div>
      <div class='value'><?php echo $cirugia->getMedicoPrograma() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>En atención a</div>
      <div class='value'><?php echo $cirugia->getAtencion() ?> </div>
    </div>

  <!-- Penultimo Renglon -->
    <div class='cellData cols04'>
      <div class='label'>Riesgo quirurgico</div>
      <div class='value'><?php echo $cirugia->getRiesgoQxPre() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Insumos indispensables</div>
      <div class='value'><?php echo $cirugia->getReqInsumos() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Requerimientos de Anestesiología</div>
      <div class='value'><?php echo $cirugia->getReqAnestesico() ?> </div>
    </div>

  <!-- Último Renglon -->
    <div class='cellData cols04'>
      <div class='label'>Hemoderivados</div>
      <div class='value'><?php echo $cirugia->getReqHemoderiv() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Laboratorio</div>
      <div class='value'><?php echo $cirugia->getReqLaboratorio() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Otros insumos</div>
      <div class='value'><?php echo $cirugia->getRequerimiento() ?> </div>
    </div>
  </div>
