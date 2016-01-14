<?php

/**
 * @package    contao-query-builder
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2016 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

use Aura\SqlQuery\QueryFactory;
use Netzmacht\Contao\QueryBuilder\Factory;

global $container;

$container['query-builder.factory'] = $container->share(
    function ($container) {
        return new Factory(
            $container['database.connection'],
            $container['query-builder.query-factory']
        );
    }
);

$container['query-builder.query-factory'] = $container->share(
    function ($container) {
        $dbDriver = strtolower($container['config']->get('dbDriver'));

        if ($dbDriver === 'mysqli') {
            $dbDriver = 'mysql';
        }

        return new QueryFactory($dbDriver);
    }
);
