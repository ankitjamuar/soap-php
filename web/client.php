<?php

require_once __DIR__.'/../autoload.php';

use \Zend\Soap\Client;

$options = array(
	'uri' => URI,
	'location' => "http://soap.test",
	'soap_version' => SOAP_1_2,
);
$client = new Client("http://soap.test", $options);

var_dump($client->getFunctions());

try {
//	var_dump($client->getAllTags('foo', 'bar'));
  var_dump($client->addPost('foo', 'bar', array(
    'title' => 'Marilyn Manson (grupa muzyczna)',
    'link' => 'http://pl.wikipedia.org/wiki/Marilyn_Manson',
    'tags' => array('marilyn', 'manson', 'spooky kids')
  )));

  foreach ($client->getPostsByTag('foo', 'bar', 'marilyn') as $post)
    $client->deletePost('foo', 'bar', $post->id);
} catch (SoapFault $sf) {
	var_dump($sf);
}
