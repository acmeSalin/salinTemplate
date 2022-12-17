<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
global $wpdb;

$capsule->addConnection( [
	'driver'    => 'mysql',
	'host'      => DB_HOST,
	'database'  => DB_NAME,
	'username'  => DB_USER,
	'password'  => DB_PASSWORD,
	'charset'   => DB_CHARSET,
	'collation' => 'utf8mb4_unicode_ci',
	'prefix'    => $wpdb->prefix,
] );

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule->setEventDispatcher( new Dispatcher( new Container ) );

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();