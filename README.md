Contao Query builder
====================

[![Build Status](http://img.shields.io/travis/netzmacht/contao-query-builder/master.svg?style=flat-square)](https://travis-ci.org/netzmacht/contao-query-builder)
[![Version](http://img.shields.io/packagist/v/netzmacht/contao-query-builder.svg?style=flat-square)](http://packagist.com/packages/netzmacht/contao-query-builder)
[![License](http://img.shields.io/packagist/l/netzmacht/contao-query-builder.svg?style=flat-square)](http://packagist.com/packages/netzmacht/contao-query-builder)
[![Downloads](http://img.shields.io/packagist/dt/netzmacht/contao-query-builder.svg?style=flat-square)](http://packagist.com/packages/netzmacht/contao-query-builder)
[![Contao Community Alliance coding standard](http://img.shields.io/badge/cca-coding_standard-red.svg?style=flat-square)](https://github.com/contao-community-alliance/coding-standard)

This extension provides a query builder based on the [aura/sqlquery](https://github.com/auraphp).

Install
-------

You can install this library using Composer. It requires at least PHP 5.5 and Contao 3.2.

```
$ php composer.phar require netzmacht/contao-query-builder:~1.0
```

Documentation
-------------

Please refer to the aura/sqlquery [documentation](https://github.com/auraphp/Aura.SqlQuery/blob/2.x/README.md) to 
understand the basic usage.

The Contao integration adds easy execution of the created statements and DI integration using 
[c-c-a/dependency-container](https://github.com/contao-community-alliance/dependency-container).

**Basic usage**

```php
$factory = $GLOBALS['container']['query-builder.factory'];

// Creates insert query implementing interface Netzmacht\Contao\QueryBuilder\Query\Insert
$insert  = $factory->newInsert();

// Creates insert query implementing interface Netzmacht\Contao\QueryBuilder\Query\Update
$update  = $factory->newUpdate();

// Creates insert query implementing interface Netzmacht\Contao\QueryBuilder\Query\Select
$select  = $factory->newSelect();

// Creates insert query implementing interface Netzmacht\Contao\QueryBuilder\Query\Delete
$delete  = $factory->newDelete();

// Executing the statement
$result = $statement->execute();

```

