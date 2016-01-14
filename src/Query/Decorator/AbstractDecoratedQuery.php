<?php

/**
 * @package    contao-query-builder
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Query\Decorator;

use Aura\SqlQuery\AbstractQuery;
use Aura\SqlQuery\QueryInterface;
use Database;
use Netzmacht\Contao\QueryBuilder\Query\ExecuteQuery;
use Netzmacht\Contao\QueryBuilder\Util\StatementUtil;

/**
 * Base query class implementation.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
abstract class AbstractDecoratedQuery implements QueryInterface, ExecuteQuery
{
    /**
     * The query.
     *
     * @var QueryInterface
     */
    protected $query;

    /**
     * Database connection.
     *
     * @var Database
     */
    protected $connection;

    /**
     * AbstractDecoratedQuery constructor.
     *
     * @param Database      $connection Database connection.
     * @param AbstractQuery $query      Query.
     */
    public function __construct(Database $connection, AbstractQuery $query)
    {
        $this->query      = $query;
        $this->connection = $connection;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {
        return $this->query->__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getQuoteNamePrefix()
    {
        return $this->query->getQuoteNamePrefix();
    }

    /**
     * {@inheritDoc}
     */
    public function getQuoteNameSuffix()
    {
        return $this->query->getQuoteNameSuffix();
    }

    /**
     * {@inheritDoc}
     */
    public function bindValues(array $values)
    {
        $this->query->bindValues($values);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function bindValue($name, $value)
    {
        $this->query->bindValue($name, $value);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBindValues()
    {
        $values     = [];
        $bindValues = $this->query->getBindValues();
        $statement  = $this->query->getStatement();
        preg_match_all('/:(\w*)/', $statement, $matches);

        foreach ($matches[1] as $value) {
            $values[] = $bindValues[$value];
        }

        return $bindValues;
    }

    /**
     * {@inheritDoc}
     */
    public function getStatement()
    {
        return preg_replace('/:\w*/i', '?', $this->query->getStatement());
    }

    /**
     * {@inheritDoc}
     */
    public function execute()
    {
        $statement = $this->getStatement();
        $values    = $this->getBindValues();

        return $this->connection->prepare($statement)->execute($values);
    }
}
