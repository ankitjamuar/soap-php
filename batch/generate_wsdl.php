<?php

require_once __DIR__.'/../autoload.php';

use \SymfonyWorld\Soap\WsdlGenerator;

$wsdl = new WsdlGenerator(URI, 'SymfonyWorld');
$wsdl->dump(__DIR_ROOT__.'/web/symfony_world.wsdl');
