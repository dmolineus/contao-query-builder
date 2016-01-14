<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Query\Decorator;

/**
 * Class ValuesStatements provides values related statements as a trait.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Contao
 */
trait ValuesStatements
{
    /**
     * {@inheritDoc}
     */
    public function col($col)
    {
        $this->query->col($col);
        
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function cols(array $cols)
    {
        $this->query->cols($cols);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function set($col, $value)
    {
        $this->query->set($col, $value);

        return $this;
    }
}
