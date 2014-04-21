<?php



/**
 * This class defines the structure of the 'hc_agenda_personal' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon Apr 21 10:06:02 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.data.map
 */
class PersonalcirugiaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.data.map.PersonalcirugiaTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('hc_agenda_personal');
        $this->setPhpName('Personalcirugia');
        $this->setClassname('Personalcirugia');
        $this->setPackage('lib.model.data');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addForeignKey('PERSONAL_ID', 'PersonalId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
        $this->addForeignKey('AGENDA_ID', 'AgendaId', 'INTEGER', 'hc_agenda', 'ID', false, null, null);
        $this->addColumn('PERSONAL_NOMBRE', 'PersonalNombre', 'VARCHAR', false, 256, null);
        $this->addForeignKey('ESPECIALIDAD_ID', 'EspecialidadId', 'INTEGER', 'siga_especialidad', 'ID', false, null, null);
        $this->addColumn('TIPO', 'Tipo', 'ENUM', false, null, null);
        $this->getColumn('TIPO', false)->setValueSet(array (
  0 => 'cirujano',
  1 => 'anestesista',
  2 => 'enfermeria',
  3 => 'otro',
));
        $this->addColumn('STATUS', 'Status', 'INTEGER', false, null, null);
        $this->addColumn('PROGRAMA', 'Programa', 'BOOLEAN', false, 1, null);
        $this->addColumn('INICIA', 'Inicia', 'BOOLEAN', false, 1, null);
        $this->addColumn('TRANSOPERATORIO', 'Transoperatorio', 'BOOLEAN', false, 1, null);
        $this->addColumn('FINALIZA', 'Finaliza', 'BOOLEAN', false, 1, null);
        $this->addColumn('TURNO', 'Turno', 'INTEGER', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Especialidad', 'Especialidad', RelationMap::MANY_TO_ONE, array('especialidad_id' => 'id', ), null, null);
        $this->addRelation('Agenda', 'Agenda', RelationMap::MANY_TO_ONE, array('agenda_id' => 'id', ), 'SET NULL', 'CASCADE');
        $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('personal_id' => 'id', ), 'SET NULL', 'CASCADE');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', ),
        );
    } // getBehaviors()

} // PersonalcirugiaTableMap
