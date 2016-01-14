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

use \Netzmacht\Contao\QueryBuilder\Query\Delete as Protocol;

/**
 * DeleteDecorator implements the delete query interface decorating aura class for Contao compatibility.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
class DeleteDecorator extends AbstractDecoratedQuery implements Protocol
{
    use WhereStatements;

    /**
     * {@inheritDoc}
     */
    public function from($from)
    {
        $this->query->delete($from);

        return $this;
    }
}
