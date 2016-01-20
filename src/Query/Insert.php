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

use Aura\SqlQuery\Common\InsertInterface;

/**
 * Insert query interface.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query
 */
interface Insert extends InsertInterface, ExecuteQuery
{
    /**
     * Adds multiple rows for bulk insert.
     *
     * @param array $rows An array of rows, where each element is an array of column key-value pairs.
     *                    The values are bound to placeholders.
     *
     * @return $this
     */
    public function addRows(array $rows);

    /**
     * Add one row for bulk insert; increments the row counter and optionally adds columns to the new row.
     *
     * When adding the first row, the counter is not incremented.
     *
     * After calling `addRow()`, you can further call `col()`, `cols()`, and
     * `set()` to work with the newly-added row. Calling `addRow()` again will
     * finish off the current row and start a new one.
     *
     * @param array $cols An array of column key-value pairs; the values are bound to placeholders.
     *
     * @return $this
     */
    public function addRow(array $cols = array());
}
