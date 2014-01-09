<?php



/**
 * This class defines the structure of the 'siga_especialidad' table.
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Wed Dec  4 10:55:32 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.config.map
 */
class EspecialidadTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'lib.model.config.map.EspecialidadTableMap';

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
        $this->setName('siga_especialidad');
        $this->setPhpName('Especialidad');
        $this->setClassname('Especialidad');
        $this->setPackage('lib.model.config');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 64, null);
        $this->getColumn('NOMBRE', false)->setPrimaryString(true);
        $this->addColumn('MEDICA', 'Medica', 'BOOLEAN', false, 1, true);
        $this->addColumn('QUIRURGICA', 'Quirurgica', 'BOOLEAN', false, 1, true);
        $this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, 1, true);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('TREE_LEFT', 'TreeLeft', 'INTEGER', false, null, null);
        $this->addColumn('TREE_RIGHT', 'TreeRight', 'INTEGER', false, null, null);
        $this->addColumn('TREE_LEVEL', 'TreeLevel', 'INTEGER', false, null, null);
        $this->addColumn('TREE_SCOPE', 'TreeScope', 'INTEGER', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Agenda', 'Agenda', RelationMap::ONE_TO_MANY, array('id' => 'servicio', ), 'SET NULL', 'CASCADE', 'Agendas');
        $this->addRelation('Procedimientocirugia', 'Procedimientocirugia', RelationMap::ONE_TO_MANY, array('id' => 'servicio_id', ), 'SET NULL', 'CASCADE', 'Procedimientocirugias');
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
            'nested_set' => array('left_column' => 'tree_left', 'right_column' => 'tree_right', 'level_column' => 'tree_level', 'use_scope' => 'true', 'scope_column' => 'tree_scope', 'method_proxies' => 'false', ),
            'symfony' => array('form' => 'true', 'filter' => 'true', ),
            'symfony_behaviors' => array(),
            'symfony_timestampable' => array('create_column' => 'created_at', ),
        );
    } // getBehaviors()

} // EspecialidadTableMap
