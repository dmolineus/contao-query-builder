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

use Aura\SqlQuery\Common\SubselectInterface;
use \Netzmacht\Contao\QueryBuilder\Query\Select as Protocol;

/**
 * Class SelectDecorator decorates the select query.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class SelectDecorator extends AbstractDecoratedQuery implements Protocol
{
    use WhereStatements;
    use ValuesStatements;

    /**
     * {@inheritDoc}
     */
    public function limit($limit)
    {
        $this->query->limit($limit);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function offset($offset)
    {
        $this->query->offset($offset);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function orderBy(array $spec)
    {
        $this->query->orderBy($spec);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setPaging($paging)
    {
        $this->query->setPaging($paging);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPaging()
    {
        return $this->query->getPaging();
    }

    /**
     * {@inheritDoc}
     */
    public function forUpdate($enable = true)
    {
        $this->query->forUpdate($enable);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function distinct($enable = true)
    {
        $this->query->distinct($enable);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function from($spec)
    {
        $this->query->from($spec);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function fromRaw($spec)
    {
        $this->query->fromRaw($spec);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function fromSubSelect($spec, $name)
    {
        $this->query->fromSubSelect($spec, $name);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function join($join, $spec, $cond = null, array $bind = array())
    {
        $this->query->join($join, $spec, $cond, $bind);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function innerJoin($spec, $cond = null, array $bind = array())
    {
        $this->join('INNER', $spec, $cond, $bind);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function leftJoin($spec, $cond = null, array $bind = array())
    {
        $this->join('INNER', $spec, $cond, $bind);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function joinSubSelect($join, $spec, $name, $cond = null, array $bind = array())
    {
        $this->query->joinSubSelect($join, $spec, $cond, $bind);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function groupBy(array $spec)
    {
        $this->query->groupBy($spec);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function having($cond)
    {
        call_user_func_array([$this, 'having'], func_get_args());

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function orHaving($cond)
    {
        call_user_func_array([$this, 'having'], func_get_args());

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function page($page)
    {
        $this->query->page($page);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function union()
    {
        $this->query->union();

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function unionAll()
    {
        $this->query->unionAll();

        return $this;
    }

    /**
     * {@inheritDoc}
     * @throws \InvalidArgumentException If an invalid values argument is given.
     */
    public function whereIn($column, $values)
    {
        if ($values instanceof SubselectInterface) {
            $condition = sprintf('%s IN(%s)', $column, $values->getStatement());
            $arguments = array_merge(
                [$condition],
                $values->getBindValues()
            );

            call_user_func_array([$this, 'where'], $arguments);

            return $this;
        }

        if (!is_array($values)) {
            throw new \InvalidArgumentException('Invalid values given. Expected array got ' . gettype($values));
        }

        if (count($values)) {
            $condition = sprintf(
                '%s IN (?%s)',
                $column,
                str_repeat(', ?', (count($values) - 1))
            );

            $arguments = array_merge(
                [$condition],
                $values
            );

            call_user_func_array([$this, 'where'], $arguments);
        }

        return $this;
    }
}
