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
