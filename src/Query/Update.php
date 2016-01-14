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

use Aura\SqlQuery\Common\UpdateInterface;

/**
 * Update interface.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
interface Update extends UpdateInterface, ExecuteQuery
{
}
