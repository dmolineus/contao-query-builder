<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Query\Util;

use Aura\SqlQuery\QueryInterface;
use Aura\SqlQuery\Common\SubselectInterface;

/**
 * Class QueryUtil.
 *
 * @package Netzmacht\Contao\QueryBuilder\Query\Util
 */
class QueryUtil
{
    /**
     * Extract query bind values in the right order.
     *
     * @param array  $bindValues Bind values.
     * @param string $statement  Query statement.
     *
     * @return array
     */
    public static function reorderBindValues($bindValues, $statement)
    {
        preg_match_all('/:(\w*)/', $statement, $matches);

        $values = [];
        foreach ($matches[1] as $value) {
            $values[] = $bindValues[$value];
        }

        return $values;
    }

    /**
     * Replaced named placeholders.
     *
     * @param string $statement Query statement.
     *
     * @return string
     */
    public static function replaceNamedPlaceHolders($statement)
    {
        return preg_replace('/:\w*/i', '?', $statement);
    }
}
