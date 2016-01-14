<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\QueryBuilder\Util;

/**
 * Class StatementUtil.
 *
 * @package Netzmacht\Contao\QueryBuilder\Util
 */
class StatementUtil
{
    /**
     * Replace placeholders with question marks as Contao does not support named placeholders.
     *
     * @param string $statement Query statement.
     *
     * @return string
     */
    public static function replacePlaceholders($statement)
    {
        return preg_replace('/:\w*/i', '?', $statement);
    }
}
