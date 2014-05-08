<?php



/**
 * Skeleton subclass for performing query and update operations on the 'hc_agenda' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Jul 17 10:47:20 2013
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model.data
 */
class AgendaQuery extends BaseAgendaQuery
{
  /* functionname
  * @autor: Antonio Sanchez Uresti
  * @date:  2014-05-07
  */
  public function filterByRequestParameters(array $param)
  {
    if ($param['quirofano_id'] != null) $this->filterByQuirofanoId($param['quirofano_id'])->joinWith('Quirofano', Criteria::LEFT_JOIN);

    if ($param['sala_id'] != null) $this->filterBySalaId($param['sala_id'])->joinWith('Salaquirurgica', Criteria::LEFT_JOIN);

    if ($param['programacion'] != null) {
      if ($param['programacion']['from']['date'] != null) $this->filterByProgramacion(array('min' => $param['programacion']['from']['date']));
      if ($param['programacion']['to']['date'] != null) $this->filterByProgramacion(array('max' => $param['programacion']['to']['date']));
    }

    if ($param['medico_name'] != null) $this->filterByMedicoName('%'.$param['medico_name'].'%');

    if ($param['servicio'] != null) $this->filterByServicio($param['servicio'])->joinWith('Especialidad', Criteria::LEFT_JOIN);

    if ($param['contaminacionqx_id'] != null) $this->filterByContaminacionqxId($param['contaminacionqx_id'])->joinWith('Contaminacionqx', Criteria::LEFT_JOIN);

    return $this;
  }



}
