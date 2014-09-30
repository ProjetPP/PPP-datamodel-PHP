<?php

if ( php_sapi_name() !== 'cli' ) {
	die( 'Not an entry point' );
}

if ( !is_readable( __DIR__ . '/../vendor/autoload.php' ) ) {
	die( 'You need to install this package with Composer before you can run the tests' );
}

$loader = require_once( __DIR__ . '/../vendor/autoload.php' );
$loader->addClassMap( array(
	'PPP\DataModel\Deserializers\DeserializerBaseTest' => __DIR__ . '/phpunit/Deserializers/DeserializerBaseTest.php'
) );
