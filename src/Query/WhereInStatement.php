<?php

/**
 * @package    contao-query-builder
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Query;

use Aura\SqlQuery\Common\SubselectInterface;

/**
 * Interface WhereIn describes extra whereIn condition.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
interface WhereInStatement
{
    /**
     * Add an AND where in query.
     *
     * @param string                   $column The query column.
     * @param array|SubselectInterface $values Set of values or subselect query.
     *
     * @return self
     */
    public function whereIn($column, $values);

    /**
     * Add a OR where in query.
     *
     * @param string                   $column The query column.
     * @param array|SubselectInterface $values Set of values or subselect query.
     *
     * @return self
     */
    public function orWhereIn($column, $values);
}
