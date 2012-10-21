<?php

function hello($name)
{
  return "hello $name";
}

$options = array(
	'uri' => "http://example.com",
	'soap_version' => SOAP_1_2,
);
$server = new SoapServer(null, $options);
$server->addFunction("hello");
$server->handle();
