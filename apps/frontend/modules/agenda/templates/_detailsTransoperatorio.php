<div class="tab-pane" id="detallesTrans">
  <div class="head" >
    <?php if ($cirugia->getStatus() == 10) echo link_to('<div class="realizada" style="float:right;"></div>', 'agenda/postoperatorio?id='.$cirugia->getId(), array('title' => 'Terminar la cirugia')) ?>
    <h3 class="text-center">Detalles del Transoperatorio</h3>
  </div>

  <!-- Primer Renglon -->
  <div class="row">
    <div class='col-md-3'>
      <div class="form-group">
        <label>Fecha de inicio</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-calendar"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getIngreso('d-M-Y') ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-3'>
      <div class="form-group">
        <label>Hora de inicio</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-clock-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getIngreso('H:i A') ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-3'>
      <div class="form-group">
        <label>Retraso al iniciar</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-minus"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getRetrasoInicial(true) ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-3'>
      <div class="form-group">
        <label>Tiempo fuera</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-circle-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getTiempoFueraText() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

  <!-- Segundo Renglon -->
  <div class="row">
    <div class='col-md-6'>
      <div class="form-group">
        <label>Médico que inicia</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user-md"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getCirujanoInicial() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-6'>
      <div class="form-group">
        <label>Anestesiologo de inicio</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getAnestesiologoInicial() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

  <!-- Tercer Renglon -->
  <div class="row">
    <div class='col-md-6'>
      <div class="form-group">
        <label>Médico que supervisa</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user-md"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getCirujanoSupInicial() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-6'>
      <div class="form-group">
        <label>Anestesiologo que supervisa</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-user"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getAnestesiologoSupInicial() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

  <!-- Cuarto Renglon -->
  <div class="row">
    <div class='col-md-4'>
      <div class="form-group">
        <label>Instrumentista</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-medkit"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getInstrumentistaInicial() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Turno</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-sun-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getInstrumentistaInicial()->getTurno() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-4'>
      <div class="form-group">
        <label>Circulante</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-stethoscope"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getCirculanteInicial() ?>" readonly="">
        </div>
      </div>
    </div>

    <div class='col-md-2'>
      <div class="form-group">
        <label>Turno</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-sun-o"></i>
          </span>
          <input class="form-control" placeholder="<?php echo $cirugia->getCirculanteInicial()->getTurno() ?>" readonly="">
        </div>
      </div>
    </div>
  </div>

  <!-- Último renglon -->
  <div class="row">
    <div class='col-md-12'>
      <div class="form-group">
        <label>Observaciones</label>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-eye"></i>
          </span>
          <textarea class="form-control" placeholder="<?php echo $cirugia->getObservaciones() ?>" readonly=""></textarea>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  // un poco sucio pero es para controlar la visibilidad de los botones para cambiar de tabs
   $("#detallesTabs").append(" <li id='detallesTrans-tab'><a href='#detallesTrans' data-toggle='tab'>Transoperatorio</a></li>");
   $("#detallesTrans-tab a").click();
});
</script>

