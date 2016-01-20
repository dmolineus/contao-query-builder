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

use \Netzmacht\Contao\QueryBuilder\Query\Insert as Protocol;

/**
 * Class InsertDecorator implements the insert query interface decorating aura class for Contao compatibility.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
class InsertDecorator extends AbstractDecoratedQuery implements Protocol
{
    use ValuesStatements;

    /**
     * {@inheritDoc}
     */
    public function into($into)
    {
        $this->query->into($into);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addRows(array $rows)
    {
        $this->query->addRows($rows);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function addRow(array $cols = array())
    {
        $this->query->addRow($cols);

        return $this;
    }
}
