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

/**
 * Class WhereStatements provides where statements as a trait.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
trait WhereStatements
{
    /**
     * {@inheritDoc}
     */
    public function where($cond)
    {
        call_user_func_array([$this->query, 'where'], func_get_args());

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function orWhere($cond)
    {
        call_user_func_array([$this->query, 'orWhere'], func_get_args());

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
