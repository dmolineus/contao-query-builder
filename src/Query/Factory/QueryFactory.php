<?php

/**
 * @package    contao-query-builder
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Query\Factory;

use Aura\SqlQuery\QueryFactory as AuraQueryFactory;

/**
 * Class QueryFactory extends aura query factory to make some methods accessible.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Factory
 */
class QueryFactory extends AuraQueryFactory
{
    /**
     * {@inheritDoc}
     */
    // @codingStandardsIgnoreStart - Coding standard doesn't detect to public changing.
    public function getQuoter()
    {
        return parent::getQuoter();
    }

    /**
     * {@inheritDoc}
     */
    public function newSeqBindPrefix()
    {
        return parent::newSeqBindPrefix();
    }
    // @codingStandardsIgnoreEnd
}
