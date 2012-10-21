<?php

$options = array(
	'uri' => "http://example.com",
	'location' => 'http://'.$_SERVER['SERVER_NAME'].'/'.str_replace('client.php', 'server.php', $_SERVER['REQUEST_URI']),
	'soap_version' => SOAP_1_2,
);
$client = new SoapClient(null, $options);
echo $client->hello('Tomasz');
