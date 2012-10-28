<?php

define('__DIR_ROOT__', __DIR__);
define('__DIR_DATA__', __DIR_ROOT__.'/data');
define('__DIR_LOGS__', __DIR_ROOT__.'/logs');

define('URI', 'http://symfony-world.blogspot.com');

ini_set("soap.wsdl_cache_enabled", "0");
use_soap_error_handler(true);

require_once __DIR_ROOT__. '/libs/vendor/ZendFramework/library/Zend/Loader/ClassMapAutoloader.php';
$loader = new Zend\Loader\ClassMapAutoloader();
$loader->registerAutoloadMap(__DIR_ROOT__. '/libs/autoload_classmap.php');
$loader->register();
