<?php

require_once __DIR__.'/Service.php';

if (isset($HTTP_RAW_POST_DATA))
{
  file_put_contents(__DIR__.'/soap-request.log', $HTTP_RAW_POST_DATA, FILE_APPEND);
  
  $options = array(
    'uri' => "http://example.com",
    'soap_version' => SOAP_1_2,
  );
  $server = new SoapServer(null, $options);
  $server->setClass("Service");
  ob_start();
  $server->handle();
  echo $response = ob_get_clean();
  
  file_put_contents(__DIR__.'/soap-response.log', $response, FILE_APPEND);
}
