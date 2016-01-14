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

use Aura\SqlQuery\Common\InsertInterface;

/**
 * Insert query interface.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
interface Insert extends InsertInterface, ExecuteQuery
{
}
