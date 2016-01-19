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

use Database;
use \Netzmacht\Contao\QueryBuilder\Query\Update as Protocol;

/**
 * Class UpdateDecorator implements the update query interface decorating aura class for Contao compatibility.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
class UpdateDecorator extends AbstractDecoratedQuery implements Protocol
{
    use ValuesStatements;
    use WhereStatements;

    /**
     * {@inheritDoc}
     */
    public function table($table)
    {
        $this->query->table($table);
    }
}
