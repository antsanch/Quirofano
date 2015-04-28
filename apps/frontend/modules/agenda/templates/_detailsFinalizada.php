<div class="tab-pane" id="detallesFin">
  <div class="head" >
    <h3 class="text-center">Detalles de Cirugía Finalizada</h3>
  </div>

  <!-- Primer Renglon -->
  <div class="row">
    <div class='col-md-3'>
      <div class="form-group">
        <label>Fecha de salida</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i>
          </span>
          <input class="form-control" placeholder="<?php echo$cirugia->getEgreso('d-M-Y')  ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Hora de salida</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-clock-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getEgreso('H:i A') ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-4'>
      <div class="form-group">
        <label>Duración</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-circle-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getTiempoTotal(true) ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-3'>
      <div class="form-group">
        <label>Destino del paciente</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-send-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getDestinoPxText() ?>" readonly="">
        </div>
      </div>
    </div>
</div>
<!-- Segundo Renglon -->
<div class="row">
    <div class='col-md-4'>
      <div class="form-group">
        <label>Infección del Sitio Quirurgico</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-info"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getRiesgoqx() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-4'>
      <div class="form-group">
        <label>Evento adverso</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-exclamation"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getEventoqx() ?>" readonly="">
        </div>
      </div>
    </div>


  <div class='col-md-4'>
    <div class="form-group">
      <label>Contaminación</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-flag"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getContaminacionqx() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

<div class="row">
    <div class='col-md-6'>
      <div class="form-group">
        <label>Eventos en anestesia</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-eye"></i>
          </span>
          <textarea class="form-control" placeholder="<?php echo $cirugia->getEvAdversosAnestesia() ?>" readonly=""></textarea>
        </div>
      </div>
    </div>

    <div class='col-md-6'>
      <div class="form-group">
        <label>Complicaciones</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-eye"></i>
          </span>
          <textarea class="form-control" placeholder="<?php echo $cirugia->getComplicaciones() ?>" readonly=""></textarea>
        </div>
      </div>
    </div>
</div>
</br>
<!-- Personal -->
<div class="panel-group accordion" id="acordPersonal">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
      <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#acordPersonal" href="#collapsePersonal" aria-expanded="false">
      <i class="fa fa-plus"></i>
      Personal</a>
      </h4>
    </div>
    <div id="collapsePersonal" class="panel-collapse collapse" aria-expanded="false">
      <div class="panel-body">
          <?php foreach ($cirugia->getPersonalcirugias() as $personal): ?>
          <?php if($personal->getFinaliza()): ?>
          <div class='col-md-6'>
            <div class="form-group">
              <label>Nombre</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i>
                </span>
                <input class="form-control" placeholder="<?php echo $personal->getPersonalNombre() ?>" readonly="">
              </div>
            </div>
          </div>

          <div class='col-md-3'>
            <div class="form-group">
              <label>Participación</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i>
                </span>
                <input class="form-control" placeholder="<?php echo $personal->getTipo() ?>" readonly="">
              </div>
            </div>
          </div>

      <?php if($personal->getTipo() == 'enfermeria'): ?>
        <div class='col-md-3'>
            <div class="form-group">
              <label>Turno</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sun-o"></i>
                </span>
                <input class="form-control" placeholder="<?php echo $personal->getTurno() ?>" readonly="">
              </div>
            </div>
          </div>
      <?php else: ?>
      <div class='col-md-3'>
            <div class="form-group">
              <label>Especialidad</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-medkit"></i>
                </span>
                <input class="form-control" placeholder="<?php echo $personal->getEspecialidad() ?>" readonly="">
              </div>
            </div>
          </div>
      <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>       
      </div>
    </div>
  </div>                              
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  // un poco sucio pero es para controlar la visibilidad de los botones para cambiar de tabs
   $("#detallesTabs").append("<li id='detallesFin-tab'><a href='#detallesFin' data-toggle='tab'>Finalizada</a></li>");
   $("#detallesFin-tab a").click();
});
</script>
