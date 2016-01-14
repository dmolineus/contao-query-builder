<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Query;

use Aura\SqlQuery\Common\SelectInterface;

/**
 * Interface Select describes the select query of the query builder.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
interface Select extends SelectInterface, Execute
{
    /**
     *
     * Adds a INNER JOIN table and columns to the query.
     *
     * @param string $spec The table specification; "foo" or "foo AS bar".
     *
     * @param string $cond Join on this condition.
     *
     * @param array $bind Values to bind to ?-placeholders in the condition.
     *
     * @return self
     *
     * @throws \Exception
     *
     */
    public function innerJoin($spec, $cond = null, array $bind = array());

    /**
     *
     * Adds a LEFT JOIN table and columns to the query.
     *
     * @param string $spec The table specification; "foo" or "foo AS bar".
     *
     * @param string $cond Join on this condition.
     *
     * @param array $bind Values to bind to ?-placeholders in the condition.
     *
     * @return self
     *
     * @throws \Exception If invalid arguments are given.
     *
     */
    public function leftJoin($spec, $cond = null, array $bind = array());
}
