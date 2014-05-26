  <div title="Transoperatorio" class="tableData trans detail clearfix" >
    <div class="head" >Detalles del Transoperatorio
<?php if ($cirugia->getStatus() == 10) echo link_to('<div class="realizada" style="float:right;"></div>', 'agenda/postoperatorio?id='.$cirugia->getId(), array('title' => 'Terminar la cirugia')) ?>
    </div>

<?php if($cirugia->getStatus() == 10): ?>
    <div class="cellData cols12" >
      <div class="value" >Esta cirugia tiene una duracion de <?php echo $cirugia->getTiempoTotal('format') ?></div>
    </div>
<?php endif; ?>

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
      <div class='label'>Retraso al iniciar</div>
      <div class='value'><?php echo $cirugia->getRetrasoInicial(true) ?> </div>
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
