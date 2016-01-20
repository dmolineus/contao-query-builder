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
use Netzmacht\Contao\QueryBuilder\Factory;
use Netzmacht\Contao\QueryBuilder\Query\ExecuteQuery;
use Netzmacht\Contao\QueryBuilder\Query\Util\QueryUtil;

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
     * @var AbstractQuery
     */
    protected $query;

    /**
     * Query builder factory.
     *
     * @var Factory
     */
    protected $factory;

    /**
     * AbstractDecoratedQuery constructor.
     *
     * @param Factory       $factory Query builder factory.
     * @param AbstractQuery $query   Query.
     */
    public function __construct(Factory $factory, AbstractQuery $query)
    {
        $this->query   = $query;
        $this->factory = $factory;
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
        return QueryUtil::reorderBindValues($this->query->getBindValues(), $this->query->getStatement());
    }

    /**
     * {@inheritDoc}
     */
    public function getStatement()
    {
        return QueryUtil::replaceNamedPlaceHolders($this->query->getStatement());
    }

    /**
     * {@inheritDoc}
     */
    public function execute()
    {
        $statement = $this->getStatement();
        $values    = $this->getBindValues();

        return $this->factory->getConnection()->prepare($statement)->execute($values);
    }

    /**
     * Get the inner query.
     *
     * @return AbstractQuery
     */
    public function getInnerQuery()
    {
        return $this->query;
    }
}
