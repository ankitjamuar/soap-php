<?php

require_once __DIR__ . '/../autoload.php';

use \Zend\Soap\Server;
use \SymfonyWorld\Manager;
use \SymfonyWorld\Soap\Service;
use \SymfonyWorld\Soap\WsdlGenerator;
use \SymfonyWorld\Soap\Logger;

$options = array(
  'uri' => URI,
  'soap_version' => SOAP_1_2,
);

if (isset($HTTP_RAW_POST_DATA))
{
  Logger::log(__DIR_LOGS__ . '/soap-request', $HTTP_RAW_POST_DATA, true);

  $manager = new Manager(__DIR_DATA__ . '/data.csv');
  $service = new Service($manager);

  $server = new Server('symfony_world.wsdl', $options);
  $server->setObject($service);
  $server->setReturnResponse();
  $result = $server->handle();
  echo $result;

  Logger::log(__DIR_LOGS__ . '/soap-response', $result, true);
}
else
{
  $wsdl = new WsdlGenerator(URI, 'SymfonyWorld');
//  $wsdl->dump(__DIR_ROOT__.'/web/symfony_world.wsdl');
  echo $wsdl;

  // from file
//	header("Content-type: text/xml");
//	ob_clean();
//	flush();
//	readfile('symfony_world.wsdl');
}