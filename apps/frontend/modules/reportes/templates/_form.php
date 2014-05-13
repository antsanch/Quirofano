<div class="formulario" style="margin: auto; overflow: auto; width: 360px;" >
  <h1>Filtro</h1>
  <form method='GET'>

    <div class="area cols06">
      <div class="label"><?php echo $filter['programacion']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['programacion'] ?>
      </div>
    </div>

    <div class="area cols06">
      <div class="label"><?php echo $filter['medico_name']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['medico_name'] ?>
      </div>
    </div>

    <div class="area cols05">
      <div class="label"><?php echo $filter['quirofano_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['quirofano_id'] ?>
      </div>
    </div>

    <div class="area cols01">
      <div class="label"><?php echo $filter['totales']['quirofano_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['quirofano_id'] ?>
      </div>
    </div>

    <div class="area cols05">
      <div class="label"><?php echo $filter['sala_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['sala_id'] ?>
      </div>
    </div>

    <div class="area cols01">
      <div class="label"><?php echo $filter['totales']['sala_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['sala_id'] ?>
      </div>
    </div>

    <div class="area cols05">
      <div class="label"><?php echo $filter['servicio']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['servicio'] ?>
      </div>
    </div>

    <div class="area cols01">
      <div class="label"><?php echo $filter['totales']['servicio']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['servicio'] ?>
      </div>
    </div>

    <div class="area cols05">
      <div class="label"><?php echo $filter['contaminacionqx_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['contaminacionqx_id'] ?>
      </div>
    </div>

    <div class="area cols01">
      <div class="label"><?php echo $filter['totales']['contaminacionqx_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['contaminacionqx_id'] ?>
      </div>
    </div>

    <div class="area cols05">
      <div class="label"><?php echo $filter['tipo_proc_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['tipo_proc_id'] ?>
      </div>
    </div>

    <div class="area cols01">
      <div class="label"><?php echo $filter['totales']['tipo_proc_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['tipo_proc_id'] ?>
      </div>
    </div>

    <div class="area cols05">
      <div class="label"><?php echo $filter['atencion_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['atencion_id'] ?>
      </div>
    </div>

    <div class="area cols01">
      <div class="label"><?php echo $filter['totales']['atencion_id']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['totales']['atencion_id'] ?>
      </div>
    </div>
    <div class="area cols06">
      <div class="label"><?php echo $filter['causa_diferido_id']->renderLabel() ?> </div>
      <div class="field">
        <?php echo $filter['causa_diferido_id'] ?>
      </div>
    </div>

    <div class="area cols06">
      <div class="label"><?php echo $filter['reintervencion']->renderLabel() ?></div>
      <div class="field">
        <?php echo $filter['reintervencion'] ?>
      </div>
    </div>

    <div class="area cols06">
      <input type="submit" value="Ver Reporte" />
      <input type="submit" name='save_reporte' value="Guardar Reporte" />
    </div>

  </form>
</div>
