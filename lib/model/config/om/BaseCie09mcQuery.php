<?php


/**
 * Base class that represents a query for the 'siga_cie9mc' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Thu Apr 17 15:01:12 2014
 *
 * @method Cie09mcQuery orderByClave($order = Criteria::ASC) Order by the clave column
 * @method Cie09mcQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method Cie09mcQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Cie09mcQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Cie09mcQuery groupByClave() Group by the clave column
 * @method Cie09mcQuery groupByDescripcion() Group by the descripcion column
 * @method Cie09mcQuery groupByCreatedAt() Group by the created_at column
 * @method Cie09mcQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Cie09mcQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Cie09mcQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Cie09mcQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Cie09mc findOne(PropelPDO $con = null) Return the first Cie09mc matching the query
 * @method Cie09mc findOneOrCreate(PropelPDO $con = null) Return the first Cie09mc matching the query, or a new Cie09mc object populated from the query conditions when no match is found
 *
 * @method Cie09mc findOneByClave(string $clave) Return the first Cie09mc filtered by the clave column
 * @method Cie09mc findOneByDescripcion(string $descripcion) Return the first Cie09mc filtered by the descripcion column
 * @method Cie09mc findOneByCreatedAt(string $created_at) Return the first Cie09mc filtered by the created_at column
 * @method Cie09mc findOneByUpdatedAt(string $updated_at) Return the first Cie09mc filtered by the updated_at column
 *
 * @method array findByClave(string $clave) Return Cie09mc objects filtered by the clave column
 * @method array findByDescripcion(string $descripcion) Return Cie09mc objects filtered by the descripcion column
 * @method array findByCreatedAt(string $created_at) Return Cie09mc objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Cie09mc objects filtered by the updated_at column
 *
 * @package    propel.generator.lib.model.config.om
 */
abstract class BaseCie09mcQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseCie09mcQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'Cie09mc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Cie09mcQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Cie09mcQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Cie09mcQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Cie09mcQuery) {
            return $criteria;
        }
        $query = new Cie09mcQuery();
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
     * @return   Cie09mc|Cie09mc[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Cie09mcPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Cie09mcPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   Cie09mc A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `CLAVE`, `DESCRIPCION`, `CREATED_AT`, `UPDATED_AT` FROM `siga_cie9mc` WHERE `CLAVE` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Cie09mc();
            $obj->hydrate($row);
            Cie09mcPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Cie09mc|Cie09mc[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Cie09mc[]|mixed the list of results, formatted by the current formatter
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
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Cie09mcPeer::CLAVE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Cie09mcPeer::CLAVE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the clave column
     *
     * Example usage:
     * <code>
     * $query->filterByClave('fooValue');   // WHERE clave = 'fooValue'
     * $query->filterByClave('%fooValue%'); // WHERE clave LIKE '%fooValue%'
     * </code>
     *
     * @param     string $clave The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function filterByClave($clave = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($clave)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $clave)) {
                $clave = str_replace('*', '%', $clave);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Cie09mcPeer::CLAVE, $clave, $comparison);
    }

    /**
     * Filter the query on the descripcion column
     *
     * Example usage:
     * <code>
     * $query->filterByDescripcion('fooValue');   // WHERE descripcion = 'fooValue'
     * $query->filterByDescripcion('%fooValue%'); // WHERE descripcion LIKE '%fooValue%'
     * </code>
     *
     * @param     string $descripcion The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function filterByDescripcion($descripcion = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($descripcion)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $descripcion)) {
                $descripcion = str_replace('*', '%', $descripcion);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Cie09mcPeer::DESCRIPCION, $descripcion, $comparison);
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
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Cie09mcPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Cie09mcPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Cie09mcPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Cie09mcPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Cie09mcPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Cie09mcPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   Cie09mc $cie09mc Object to remove from the list of results
     *
     * @return Cie09mcQuery The current query, for fluid interface
     */
    public function prune($cie09mc = null)
    {
        if ($cie09mc) {
            $this->addUsingAlias(Cie09mcPeer::CLAVE, $cie09mc->getClave(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
