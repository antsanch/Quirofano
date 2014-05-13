<?php


/**
 * Base class that represents a query for the 'hc_agenda_reporte' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Mon May 12 20:59:54 2014
 *
 * @method ReporteqxQuery orderById($order = Criteria::ASC) Order by the id column
 * @method ReporteqxQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method ReporteqxQuery orderByQuerystring($order = Criteria::ASC) Order by the querystring column
 * @method ReporteqxQuery orderByQuirofanoId($order = Criteria::ASC) Order by the quirofano_id column
 * @method ReporteqxQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ReporteqxQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 *
 * @method ReporteqxQuery groupById() Group by the id column
 * @method ReporteqxQuery groupByNombre() Group by the nombre column
 * @method ReporteqxQuery groupByQuerystring() Group by the querystring column
 * @method ReporteqxQuery groupByQuirofanoId() Group by the quirofano_id column
 * @method ReporteqxQuery groupByCreatedAt() Group by the created_at column
 * @method ReporteqxQuery groupBySlug() Group by the slug column
 *
 * @method ReporteqxQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ReporteqxQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ReporteqxQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ReporteqxQuery leftJoinQuirofano($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quirofano relation
 * @method ReporteqxQuery rightJoinQuirofano($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quirofano relation
 * @method ReporteqxQuery innerJoinQuirofano($relationAlias = null) Adds a INNER JOIN clause to the query using the Quirofano relation
 *
 * @method Reporteqx findOne(PropelPDO $con = null) Return the first Reporteqx matching the query
 * @method Reporteqx findOneOrCreate(PropelPDO $con = null) Return the first Reporteqx matching the query, or a new Reporteqx object populated from the query conditions when no match is found
 *
 * @method Reporteqx findOneById(int $id) Return the first Reporteqx filtered by the id column
 * @method Reporteqx findOneByNombre(string $nombre) Return the first Reporteqx filtered by the nombre column
 * @method Reporteqx findOneByQuerystring(string $querystring) Return the first Reporteqx filtered by the querystring column
 * @method Reporteqx findOneByQuirofanoId(int $quirofano_id) Return the first Reporteqx filtered by the quirofano_id column
 * @method Reporteqx findOneByCreatedAt(string $created_at) Return the first Reporteqx filtered by the created_at column
 * @method Reporteqx findOneBySlug(string $slug) Return the first Reporteqx filtered by the slug column
 *
 * @method array findById(int $id) Return Reporteqx objects filtered by the id column
 * @method array findByNombre(string $nombre) Return Reporteqx objects filtered by the nombre column
 * @method array findByQuerystring(string $querystring) Return Reporteqx objects filtered by the querystring column
 * @method array findByQuirofanoId(int $quirofano_id) Return Reporteqx objects filtered by the quirofano_id column
 * @method array findByCreatedAt(string $created_at) Return Reporteqx objects filtered by the created_at column
 * @method array findBySlug(string $slug) Return Reporteqx objects filtered by the slug column
 *
 * @package    propel.generator.lib.model.data.om
 */
abstract class BaseReporteqxQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseReporteqxQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Reporteqx', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ReporteqxQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     ReporteqxQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ReporteqxQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ReporteqxQuery) {
            return $criteria;
        }
        $query = new ReporteqxQuery();
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
     * @return   Reporteqx|Reporteqx[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ReporteqxPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ReporteqxPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Reporteqx A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `NOMBRE`, `QUERYSTRING`, `QUIROFANO_ID`, `CREATED_AT`, `SLUG` FROM `hc_agenda_reporte` WHERE `ID` = :p0';
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
            $obj = new Reporteqx();
            $obj->hydrate($row);
            ReporteqxPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Reporteqx|Reporteqx[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Reporteqx[]|mixed the list of results, formatted by the current formatter
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
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ReporteqxPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ReporteqxPeer::ID, $keys, Criteria::IN);
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
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(ReporteqxPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the nombre column
     *
     * Example usage:
     * <code>
     * $query->filterByNombre('fooValue');   // WHERE nombre = 'fooValue'
     * $query->filterByNombre('%fooValue%'); // WHERE nombre LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nombre The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterByNombre($nombre = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nombre)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nombre)) {
                $nombre = str_replace('*', '%', $nombre);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReporteqxPeer::NOMBRE, $nombre, $comparison);
    }

    /**
     * Filter the query on the querystring column
     *
     * Example usage:
     * <code>
     * $query->filterByQuerystring('fooValue');   // WHERE querystring = 'fooValue'
     * $query->filterByQuerystring('%fooValue%'); // WHERE querystring LIKE '%fooValue%'
     * </code>
     *
     * @param     string $querystring The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterByQuerystring($querystring = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($querystring)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $querystring)) {
                $querystring = str_replace('*', '%', $querystring);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReporteqxPeer::QUERYSTRING, $querystring, $comparison);
    }

    /**
     * Filter the query on the quirofano_id column
     *
     * Example usage:
     * <code>
     * $query->filterByQuirofanoId(1234); // WHERE quirofano_id = 1234
     * $query->filterByQuirofanoId(array(12, 34)); // WHERE quirofano_id IN (12, 34)
     * $query->filterByQuirofanoId(array('min' => 12)); // WHERE quirofano_id > 12
     * </code>
     *
     * @see       filterByQuirofano()
     *
     * @param     mixed $quirofanoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterByQuirofanoId($quirofanoId = null, $comparison = null)
    {
        if (is_array($quirofanoId)) {
            $useMinMax = false;
            if (isset($quirofanoId['min'])) {
                $this->addUsingAlias(ReporteqxPeer::QUIROFANO_ID, $quirofanoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quirofanoId['max'])) {
                $this->addUsingAlias(ReporteqxPeer::QUIROFANO_ID, $quirofanoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReporteqxPeer::QUIROFANO_ID, $quirofanoId, $comparison);
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
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ReporteqxPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ReporteqxPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ReporteqxPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
     * $query->filterBySlug('%fooValue%'); // WHERE slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $slug)) {
                $slug = str_replace('*', '%', $slug);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ReporteqxPeer::SLUG, $slug, $comparison);
    }

    /**
     * Filter the query by a related Quirofano object
     *
     * @param   Quirofano|PropelObjectCollection $quirofano The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   ReporteqxQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByQuirofano($quirofano, $comparison = null)
    {
        if ($quirofano instanceof Quirofano) {
            return $this
                ->addUsingAlias(ReporteqxPeer::QUIROFANO_ID, $quirofano->getId(), $comparison);
        } elseif ($quirofano instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ReporteqxPeer::QUIROFANO_ID, $quirofano->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByQuirofano() only accepts arguments of type Quirofano or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quirofano relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function joinQuirofano($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quirofano');

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
            $this->addJoinObject($join, 'Quirofano');
        }

        return $this;
    }

    /**
     * Use the Quirofano relation Quirofano object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   QuirofanoQuery A secondary query class using the current class as primary query
     */
    public function useQuirofanoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinQuirofano($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quirofano', 'QuirofanoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Reporteqx $reporteqx Object to remove from the list of results
     *
     * @return ReporteqxQuery The current query, for fluid interface
     */
    public function prune($reporteqx = null)
    {
        if ($reporteqx) {
            $this->addUsingAlias(ReporteqxPeer::ID, $reporteqx->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // sluggable behavior

    /**
     * Find one object based on its slug
     *
     * @param     string $slug The value to use as filter.
     * @param     PropelPDO $con The optional connection object
     *
     * @return    Reporteqx the result, formatted by the current formatter
     */
    public function findOneBySlug($slug, $con = null)
    {
        return $this->filterBySlug($slug)->findOne($con);
    }

}
