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

use Database\Result;

/**
 * Execute interface.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
interface ExecuteQuery
{
    /**
     * Execute the query and return the result.
     *
     * @return Result
     */
    public function execute();
}
