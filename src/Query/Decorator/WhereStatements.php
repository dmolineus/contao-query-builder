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

use Netzmacht\Contao\QueryBuilder\Query\WherePlugin;

/**
 * Class WhereStatements provides where statements as a trait.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
trait WhereStatements
{
    use WherePlugin;

    /**
     * {@inheritDoc}
     */
    public function where($cond)
    {
        $arguments = is_callable($cond)
            ? $this->buildConditionArguments($cond)
            : func_get_args();

        call_user_func_array([$this->query, 'where'], $arguments);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function orWhere($cond)
    {
        $arguments = is_callable($cond)
            ? $this->buildConditionArguments($cond)
            : func_get_args();

        call_user_func_array([$this->query, 'orWhere'], $arguments);

        return $this;
    }
}
