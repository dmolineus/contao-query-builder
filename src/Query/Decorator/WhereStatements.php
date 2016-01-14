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
}
