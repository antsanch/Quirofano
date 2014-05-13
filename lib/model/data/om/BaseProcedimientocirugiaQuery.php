<?php


/**
 * Base class that represents a query for the 'hc_agenda_procedimientos' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon May 12 20:59:54 2014
 *
 * @method ProcedimientocirugiaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ProcedimientocirugiaQuery orderByAgendaId($order = Criteria::ASC) Order by the agenda_id column
 * @method ProcedimientocirugiaQuery orderByCie9mc($order = Criteria::ASC) Order by the cie9mc column
 * @method ProcedimientocirugiaQuery orderByCie9mcId($order = Criteria::ASC) Order by the cie9mc_id column
 * @method ProcedimientocirugiaQuery orderByRegion($order = Criteria::ASC) Order by the region column
 * @method ProcedimientocirugiaQuery orderByDetalles($order = Criteria::ASC) Order by the detalles column
 * @method ProcedimientocirugiaQuery orderByServicioId($order = Criteria::ASC) Order by the servicio_id column
 * @method ProcedimientocirugiaQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method ProcedimientocirugiaQuery groupById() Group by the id column
 * @method ProcedimientocirugiaQuery groupByAgendaId() Group by the agenda_id column
 * @method ProcedimientocirugiaQuery groupByCie9mc() Group by the cie9mc column
 * @method ProcedimientocirugiaQuery groupByCie9mcId() Group by the cie9mc_id column
 * @method ProcedimientocirugiaQuery groupByRegion() Group by the region column
 * @method ProcedimientocirugiaQuery groupByDetalles() Group by the detalles column
 * @method ProcedimientocirugiaQuery groupByServicioId() Group by the servicio_id column
 * @method ProcedimientocirugiaQuery groupByCreatedAt() Group by the created_at column
 *
 * @method ProcedimientocirugiaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProcedimientocirugiaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProcedimientocirugiaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProcedimientocirugiaQuery leftJoinAgenda($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agenda relation
 * @method ProcedimientocirugiaQuery rightJoinAgenda($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agenda relation
 * @method ProcedimientocirugiaQuery innerJoinAgenda($relationAlias = null) Adds a INNER JOIN clause to the query using the Agenda relation
 *
 * @method ProcedimientocirugiaQuery leftJoinEspecialidad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Especialidad relation
 * @method ProcedimientocirugiaQuery rightJoinEspecialidad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Especialidad relation
 * @method ProcedimientocirugiaQuery innerJoinEspecialidad($relationAlias = null) Adds a INNER JOIN clause to the query using the Especialidad relation
 *
 * @method Procedimientocirugia findOne(PropelPDO $con = null) Return the first Procedimientocirugia matching the query
 * @method Procedimientocirugia findOneOrCreate(PropelPDO $con = null) Return the first Procedimientocirugia matching the query, or a new Procedimientocirugia object populated from the query conditions when no match is found
 *
 * @method Procedimientocirugia findOneById(int $id) Return the first Procedimientocirugia filtered by the id column
 * @method Procedimientocirugia findOneByAgendaId(int $agenda_id) Return the first Procedimientocirugia filtered by the agenda_id column
 * @method Procedimientocirugia findOneByCie9mc(string $cie9mc) Return the first Procedimientocirugia filtered by the cie9mc column
 * @method Procedimientocirugia findOneByCie9mcId(string $cie9mc_id) Return the first Procedimientocirugia filtered by the cie9mc_id column
 * @method Procedimientocirugia findOneByRegion(int $region) Return the first Procedimientocirugia filtered by the region column
 * @method Procedimientocirugia findOneByDetalles(string $detalles) Return the first Procedimientocirugia filtered by the detalles column
 * @method Procedimientocirugia findOneByServicioId(int $servicio_id) Return the first Procedimientocirugia filtered by the servicio_id column
 * @method Procedimientocirugia findOneByCreatedAt(string $created_at) Return the first Procedimientocirugia filtered by the created_at column
 *
 * @method array findById(int $id) Return Procedimientocirugia objects filtered by the id column
 * @method array findByAgendaId(int $agenda_id) Return Procedimientocirugia objects filtered by the agenda_id column
 * @method array findByCie9mc(string $cie9mc) Return Procedimientocirugia objects filtered by the cie9mc column
 * @method array findByCie9mcId(string $cie9mc_id) Return Procedimientocirugia objects filtered by the cie9mc_id column
 * @method array findByRegion(int $region) Return Procedimientocirugia objects filtered by the region column
 * @method array findByDetalles(string $detalles) Return Procedimientocirugia objects filtered by the detalles column
 * @method array findByServicioId(int $servicio_id) Return Procedimientocirugia objects filtered by the servicio_id column
 * @method array findByCreatedAt(string $created_at) Return Procedimientocirugia objects filtered by the created_at column
 *
 * @package    propel.generator.lib.model.data.om
 */
abstract class BaseProcedimientocirugiaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseProcedimientocirugiaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Procedimientocirugia', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProcedimientocirugiaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ProcedimientocirugiaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProcedimientocirugiaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProcedimientocirugiaQuery) {
            return $criteria;
        }
        $query = new ProcedimientocirugiaQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Procedimientocirugia|Procedimientocirugia[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProcedimientocirugiaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProcedimientocirugiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   Procedimientocirugia A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `AGENDA_ID`, `CIE9MC`, `CIE9MC_ID`, `REGION`, `DETALLES`, `SERVICIO_ID`, `CREATED_AT` FROM `hc_agenda_procedimientos` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Procedimientocirugia();
            $obj->hydrate($row);
            ProcedimientocirugiaPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Procedimientocirugia|Procedimientocirugia[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Procedimientocirugia[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProcedimientocirugiaPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProcedimientocirugiaPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the agenda_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAgendaId(1234); // WHERE agenda_id = 1234
     * $query->filterByAgendaId(array(12, 34)); // WHERE agenda_id IN (12, 34)
     * $query->filterByAgendaId(array('min' => 12)); // WHERE agenda_id > 12
     * </code>
     *
     * @see       filterByAgenda()
     *
     * @param     mixed $agendaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByAgendaId($agendaId = null, $comparison = null)
    {
        if (is_array($agendaId)) {
            $useMinMax = false;
            if (isset($agendaId['min'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::AGENDA_ID, $agendaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($agendaId['max'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::AGENDA_ID, $agendaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::AGENDA_ID, $agendaId, $comparison);
    }

    /**
     * Filter the query on the cie9mc column
     *
     * Example usage:
     * <code>
     * $query->filterByCie9mc('fooValue');   // WHERE cie9mc = 'fooValue'
     * $query->filterByCie9mc('%fooValue%'); // WHERE cie9mc LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cie9mc The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByCie9mc($cie9mc = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cie9mc)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cie9mc)) {
                $cie9mc = str_replace('*', '%', $cie9mc);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::CIE9MC, $cie9mc, $comparison);
    }

    /**
     * Filter the query on the cie9mc_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCie9mcId('fooValue');   // WHERE cie9mc_id = 'fooValue'
     * $query->filterByCie9mcId('%fooValue%'); // WHERE cie9mc_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cie9mcId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByCie9mcId($cie9mcId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cie9mcId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cie9mcId)) {
                $cie9mcId = str_replace('*', '%', $cie9mcId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::CIE9MC_ID, $cie9mcId, $comparison);
    }

    /**
     * Filter the query on the region column
     *
     * Example usage:
     * <code>
     * $query->filterByRegion(1234); // WHERE region = 1234
     * $query->filterByRegion(array(12, 34)); // WHERE region IN (12, 34)
     * $query->filterByRegion(array('min' => 12)); // WHERE region > 12
     * </code>
     *
     * @param     mixed $region The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByRegion($region = null, $comparison = null)
    {
        if (is_array($region)) {
            $useMinMax = false;
            if (isset($region['min'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::REGION, $region['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($region['max'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::REGION, $region['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::REGION, $region, $comparison);
    }

    /**
     * Filter the query on the detalles column
     *
     * Example usage:
     * <code>
     * $query->filterByDetalles('fooValue');   // WHERE detalles = 'fooValue'
     * $query->filterByDetalles('%fooValue%'); // WHERE detalles LIKE '%fooValue%'
     * </code>
     *
     * @param     string $detalles The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByDetalles($detalles = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($detalles)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $detalles)) {
                $detalles = str_replace('*', '%', $detalles);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::DETALLES, $detalles, $comparison);
    }

    /**
     * Filter the query on the servicio_id column
     *
     * Example usage:
     * <code>
     * $query->filterByServicioId(1234); // WHERE servicio_id = 1234
     * $query->filterByServicioId(array(12, 34)); // WHERE servicio_id IN (12, 34)
     * $query->filterByServicioId(array('min' => 12)); // WHERE servicio_id > 12
     * </code>
     *
     * @see       filterByEspecialidad()
     *
     * @param     mixed $servicioId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByServicioId($servicioId = null, $comparison = null)
    {
        if (is_array($servicioId)) {
            $useMinMax = false;
            if (isset($servicioId['min'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::SERVICIO_ID, $servicioId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($servicioId['max'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::SERVICIO_ID, $servicioId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::SERVICIO_ID, $servicioId, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProcedimientocirugiaPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProcedimientocirugiaPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related Agenda object
     *
     * @param   Agenda|PropelObjectCollection $agenda The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProcedimientocirugiaQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByAgenda($agenda, $comparison = null)
    {
        if ($agenda instanceof Agenda) {
            return $this
                ->addUsingAlias(ProcedimientocirugiaPeer::AGENDA_ID, $agenda->getId(), $comparison);
        } elseif ($agenda instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProcedimientocirugiaPeer::AGENDA_ID, $agenda->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAgenda() only accepts arguments of type Agenda or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Agenda relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function joinAgenda($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Agenda');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Agenda');
        }

        return $this;
    }

    /**
     * Use the Agenda relation Agenda object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   AgendaQuery A secondary query class using the current class as primary query
     */
    public function useAgendaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAgenda($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Agenda', 'AgendaQuery');
    }

    /**
     * Filter the query by a related Especialidad object
     *
     * @param   Especialidad|PropelObjectCollection $especialidad The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ProcedimientocirugiaQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByEspecialidad($especialidad, $comparison = null)
    {
        if ($especialidad instanceof Especialidad) {
            return $this
                ->addUsingAlias(ProcedimientocirugiaPeer::SERVICIO_ID, $especialidad->getId(), $comparison);
        } elseif ($especialidad instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProcedimientocirugiaPeer::SERVICIO_ID, $especialidad->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByEspecialidad() only accepts arguments of type Especialidad or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Especialidad relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function joinEspecialidad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Especialidad');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Especialidad');
        }

        return $this;
    }

    /**
     * Use the Especialidad relation Especialidad object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   EspecialidadQuery A secondary query class using the current class as primary query
     */
    public function useEspecialidadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinEspecialidad($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Especialidad', 'EspecialidadQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Procedimientocirugia $procedimientocirugia Object to remove from the list of results
     *
     * @return ProcedimientocirugiaQuery The current query, for fluid interface
     */
    public function prune($procedimientocirugia = null)
    {
        if ($procedimientocirugia) {
            $this->addUsingAlias(ProcedimientocirugiaPeer::ID, $procedimientocirugia->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
