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

use Aura\SqlQuery\AbstractQuery;
use Aura\SqlQuery\Common\SubselectInterface;
use Aura\SqlQuery\Common\WhereInterface;
use Aura\SqlQuery\Quoter;
use Netzmacht\Contao\QueryBuilder\Factory;

/**
 * Class Condition.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
final class Condition extends AbstractQuery implements SubselectInterface, WhereInterface, WhereInStatement
{
    use WherePlugin;

    /**
     * Query builder factory.
     *
     * @var Factory
     */
    private $factory;

    /**
     * Construct the condition.
     *
     * @param Factory $factory       Query builder factory.
     * @param Quoter  $quoter        Outer instance.
     * @param string  $seqBindPrefix Seq bind prefix.
     */
    public function __construct(Factory $factory, Quoter $quoter, $seqBindPrefix = '')
    {
        parent::__construct($quoter, $seqBindPrefix);

        $this->factory = $factory;
    }

    /**
     * {@inheritDoc}
     */
    public function where($cond)
    {
        $arguments = is_callable($cond)
            ? $this->buildCallbackCondition($cond)
            : func_get_args();

        return $this->addWhere('AND', $arguments);
    }

    /**
     * {@inheritDoc}
     */
    public function orWhere($cond)
    {
        $arguments = is_callable($cond)
            ? $this->buildCallbackCondition($cond)
            : func_get_args();

        return $this->addWhere('OR', $arguments);
    }

    /**
     * {@inheritDoc}
     */
    protected function build()
    {
        $where = preg_replace('/^\s*WHERE/', '', $this->buildWhere());

        return '(' . $where . ')';
    }
}
