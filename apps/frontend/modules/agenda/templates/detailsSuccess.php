<style>
  .detail {
    border: 1px solid black;
    margin: 0 0 5px 0;
    padding: 3px;
  }

  .head {
    border-bottom: 1px solid black;
    font-size: large;
    text-align: center;
    width: 100%;
  }

  .realizada {
    background: lightblue;
  }

  .trans {
    background: lightred;
  }

  .cellData {
    float: left;
    margin: 1px 4px;
  }

  .tableData .cols01 {width: 051px}
  .tableData .cols02 {width: 110px}
  .tableData .cols03 {width: 169px}
  .tableData .cols04 {width: 228px}
  .tableData .cols05 {width: 287px}
  .tableData .cols06 {width: 346px}
  .tableData .cols07 {width: 405px}
  .tableData .cols08 {width: 464px}
  .tableData .cols09 {width: 523px}
  .tableData .cols10 {width: 582px}
  .tableData .cols11 {width: 641px}
  .tableData .cols12 {width: 700px}

  .label {
    font-weight: bold;
    /* border-bottom: 1px dashed darkgray; /**/
  }

  .cellData .value {
    background: #DDD;
    border-radius: 3px;
  }
</style>
<?php switch ($cirugia->getStatus()): ?>
<?php case 100: ?>
  <div class="tableData detail realizada clearfix" >
    <div class="head" >Detalles de la Cirugía</div>

<!-- Primer Renglon -->
    <div class='cellData cols03'>
      <div class='label'>Fecha de Salida</div>
      <div class='value'><?php echo $cirugia->getEgreso('d-M-Y') ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Hora de Salida</div>
      <div class='value'><?php echo $cirugia->getEgreso('H:i A') ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Duración</div>
      <div class='value'><?php echo $cirugia->getTiempoFueraText() ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Destino del Paciente</div>
      <div class='value'><?php echo $cirugia->getDestinoPxText() ?> </div>
    </div>

<!-- Segundo Renglon -->
    <div class='cellData cols06'>
      <div class='label'>Infección del Sitio Quirurgico</div>
      <div class='value'><?php echo $cirugia->getRiesgoqx() ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Evento Adverso</div>
      <div class='value'><?php echo $cirugia->getEventoqx() ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Contaminación</div>
      <div class='value'><?php echo $cirugia->getContaminacionqx() ?> </div>
    </div>

<!-- Tercer Renglon -->
    <div class='cellData cols12'>
      <div class='label'>Eventos en Anestesia</div>
      <div class='value'><?php echo $cirugia->getEvAdversosAnestesia() ?> </div>
    </div>

<!-- Cuarto Renglon -->
    <div class='cellData cols12'>
      <div class='label'>Complicaciones</div>
      <div class='value'><?php echo $cirugia->getComplicaciones() ?> </div>
    </div>

<?php foreach ($cirugia->getPersonalcirugias() as $personal): ?>
<?php if($personal->getFinaliza()): ?>
      <div class='cellData cols06'>
      <div class='label'>Nombre</div>
      <div class='value'><?php echo $personal->getPersonalNombre() ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Participación</div>
      <div class='value'><?php echo $personal->getTipo() ?> </div>
    </div>

<?php if($personal->getTipo() == 'enfermeria'): ?>
    <div class='cellData cols03'>
      <div class='label'>Turno</div>
      <div class='value'><?php echo $personal->getTurno() ?> </div>
    </div>
<?php else: ?>
    <div class='cellData cols03'>
      <div class='label'>Especialidad</div>
      <div class='value'><?php echo $personal->getEspecialidad() ?> </div>
    </div>
<?php endif; ?>

<?php endif; ?>
<?php endforeach; ?>
  </div>

<?php case 10: ?>
  <div class="tableData trans detail clearfix" >
    <div class="head" >Detalles del Transoperatorio</div>

<!-- Primer Renglon -->
    <div class='cellData cols03'>
      <div class='label'>Fecha de Inicio</div>
      <div class='value'><?php echo $cirugia->getIngreso('d-M-Y') ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Hora de inicio</div>
      <div class='value'><?php echo $cirugia->getIngreso('H:i A') ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Tiempo de retraso</div>
      <div class='value'><?php echo $cirugia->getTiempoDiferido() ?> </div>
    </div>

    <div class='cellData cols03'>
      <div class='label'>Tiempo fuera</div>
      <div class='value'><?php echo $cirugia->getTiempoFueraText() ?> </div>
    </div>

<!-- Segundo Renglon -->
    <div class='cellData cols06'>
      <div class='label'>Medico que inicia</div>
      <div class='value'><?php echo $cirugia->getCirujanoInicial() ?> </div>
    </div>

    <div class='cellData cols06'>
      <div class='label'>Anestesiologo de Inicio</div>
      <div class='value'><?php echo $cirugia->getAnestesiologoInicial() ?> </div>
    </div>

<!-- Tercer Renglon -->
    <div class='cellData cols06'>
      <div class='label'>Médico que supervisa</div>
      <div class='value'><?php echo $cirugia->getCirujanoSupInicial() ?> </div>
    </div>

    <div class='cellData cols06'>
      <div class='label'>Anestesiologo que supervisa</div>
      <div class='value'><?php echo $cirugia->getAnestesiologoSupInicial() ?> </div>
    </div>

<!-- Cuarto Renglon -->
    <div class='cellData cols04'>
      <div class='label'>Instrumentista</div>
      <div class='value'><?php echo $cirugia->getInstrumentistaInicial() ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Turno</div>
      <div class='value'><?php echo $cirugia->getInstrumentistaInicial()->getTurno() ?> </div>
    </div>

    <div class='cellData cols04'>
      <div class='label'>Circulante</div>
      <div class='value'><?php echo $cirugia->getCirculanteInicial() ?> </div>
    </div>

    <div class='cellData cols02'>
      <div class='label'>Turno</div>
      <div class='value'><?php echo $cirugia->getCirculanteInicial()->getTurno() ?> </div>
    </div>

    <div class='cellData cols12'>
      <div class='label'>Observaciones</div>
      <div class='value'><?php echo $cirugia->getObservaciones() ?> </div>
    </div>
  </div>
<?php case 1: ?>

<?php if ($cirugia->estaSolicitado() && $cirugia->getStatus() == 1): ?>
  Este paciente YA esta en preoperatorio
<?php endif; ?>

  <div class="tableData program detail clearfix" >
    <div class="head">
      Datos de la programacion de la cirugia
    </div>

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
<?php endswitch; ?>
