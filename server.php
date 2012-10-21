<?php

require_once __DIR__.'/Service.php';

$options = array(
	'uri' => "http://example.com",
	'soap_version' => SOAP_1_2,
);
$server = new SoapServer(null, $options);
$server->setClass("Service");
$server->handle();
